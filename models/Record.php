<?php
namespace app\models;
use app\interfaces\RecordInterface;
use app\services\Db;
use app\traits\TSingleton;

abstract class Record implements RecordInterface
{
    protected $id;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    public static function getById(int $id): Record
    { 
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject(get_called_class(), $sql, [':id' => $id])[0];
        
    }

    public static function getALl()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function delete() {
        $tableName = static::getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        $this->db->execute($sql, ['id' => $this->id]);
    }

    public function update() {
        //UPDATE `product` SET `name`="nfjefkkfe" WHERE id=4
        $tableName = static::getTableName();
        foreach ($this as $key => $value) {
            if(in_array($key,['Db', 'tableName'])) {
                continue;
            }

            $a = "`{$key}` = '$value'";
            $sql = "UPDATE {$tableName} SET {$a} WHERE id = :id";
            $this->db->execute($sql, ['id' => $this->id]);

    }
}
        

    public function insert() {
        $tableName = static::getTableName();

        $params = [];
        $column = [];

        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }
            $params[":{$key}"] = $value;
            $column[] = "`{$key}`";
        }
        $column = implode("," , $column);
        $placeholders = implode("," , array_keys($params));
        $sql = "INSERT INTO {$tableName} ({$column}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastId();
    }

    public function save() {

    }
}