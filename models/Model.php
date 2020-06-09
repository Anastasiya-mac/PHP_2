<?php
namespace models;

abstract class Model implements \interfaces\ModelInterface
{
    protected $tableName;
    protected $db = null;

    public function __construct()
    {
        $this->db = new \services\Db();
        $this->tableName = $this->getTableName();
    }

    public function getById(int $id): array
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE id = {$id}";
        return $this->db->queryOne($sql);
    }

    public function getALl()
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->queryAll($sql);
    }
}