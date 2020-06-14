<?php
namespace app\models;
use app\interfaces\ModelInterface;
use app\services\Db;
use app\traits\TSingleton;

abstract class Model implements ModelInterface
{
    protected $id;
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = Db::getInstance();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): Model
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = :id";
        return $this->db->queryObject(get_called_class(), $sql, [':id' => $id])[0];
    }

    public function getALl()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }

    public function delete() {
        $sql = "DELETE FROM {$this->tableName} WHERE id = :id";
        $this->db->execute($sql, ['id' => $this->id]);
    }

    public function update() {
        //UPDATE `product` SET `name`="nfjefkkfe" WHERE id=4
        
        foreach ($this as $key => $value) {
            if(in_array($key,['db', 'tableName'])) {
                continue;
            }

            $a = "`{$key}` = '$value'";
            $sql = "UPDATE {$this->tableName} SET {$a} WHERE id = :id";
            $this->db->execute($sql, ['id' => $this->id]);

    }
}
        

    public function insert() {
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
        $sql = "INSERT INTO {$this->tableName} ({$column}) VALUES ({$placeholders})";
        $this->db->execute($sql, $params);
        $this->id = $this->db->getLastId();
    }
}