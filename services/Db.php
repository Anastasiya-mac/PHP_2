<?php
namespace app\services;
use app\traits\TSingleton;

class Db
{
    use TSingleton;

    private $config = [
        'driver' => 'mysql' ,
        'host' => 'localhost' ,
        'login' => 'root' ,
        'password' => '',
        'database' => 'gb_db_php',
        'charset' => 'utf8',
    ];

    private $connection = null;

    public function getConnection() {
        if(is_null($this->connection)) {
            $this->connection = new \PDO(
                $this->buildDsnString(), 
                $this->config['login'],
                $this->config['password']
            );
        $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
       return $this->connection;
    }
    
    public function queryObject($className, string $sql, array $params = []) {
        $pdoStatement = $this->query($sql, $params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, $className);
        return $pdoStatement->fetchAll(); 

    }

    private function query(string $sql, array $params = []) {
        $pdoStatement = $this -> getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function getLastId(): int {
        return $this->getConnection()->lastInsertId();
    }

    public function execute(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->rowCount();
    }

    public function queryOne(string $sql, array $params = [])
    {
        return $this->queryAll($sql, $params)[0];
    }

    public function queryAll(string $sql, array $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }

    private function buildDsnString() {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this -> config['driver'],
            $this -> config['host'],
            $this -> config['database'],
            $this -> config['charset']
    );
    }
}