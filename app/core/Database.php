<?php

namespace app\core;

class Database
{
    private $driver = DATABASE['driver'];
    private $host = DATABASE['host'];
    private $user = DATABASE['user'];
    private $pass = DATABASE['pass'];
    private $name = DATABASE['name'];
    private $port = DATABASE['port'];
    private $charset = DATABASE['charset'];
    private $dbh;
    private $stmt;
    private $error;
    public function __construct()
    {
        $dsn = "{$this->driver}:host={$this->host};dbname={$this->name};port={$this->port};charset={$this->charset}";
        $opt = array(
            \PDO::ATTR_PERSISTENT => true,
            \PDO::ATTR_ERRMODE => \PDO::ERROMODE_EXCEPTION
        );
        try {
            $this->dbh = new \PDO(
                $dsn,
                $this->user,
                $this->pass,
                $opt
            );
        } catch (\PDOException $ex) {
            $this->error = $ex->getMessage();
            echo $this->error;
        }
    }
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }
    public function bind($parameter, $value, $type= null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = \PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = \PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = \PDO::PARAM_NULL;
                    break;
                
                default:
                    $type = \PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($parameter, $value, $type);
    }
    public function execute(){
        return $this->stmt->execute();
    }
    public function all(){
        $this->execute();
        return $this->stmt->fetchAll(\PDO::FETCH_OBJ);
    }
    public function fetch(){
        $this->execute();
        return $this->stmt->fetch(\PDO::FETCH_OBJ);
    }
    public function rowCount(){
        $this->execute();
        return $this->stmt->rowCount();
    }
}