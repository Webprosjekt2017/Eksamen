<?php

class Database
{
    /** @var PDO  */
    private $conn;

    /** @var PDOStatement */
    private $stmt;

    private $err;

    public function __construct()
    {
        $dsn = 'mysql:host=' . Config::DB_HOST . ';dbname=' . Config::DB_DATABASE;
        $opt = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_TIMEOUT => "5",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->conn = new PDO($dsn, Config::DB_USER, Config::DB_PASSWORD, $opt);
        } catch (PDOException $e) {
            $this->err = $e->getMessage();
        }
    }

    public function query($qry){
        $this->stmt = $this->conn->prepare($qry);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($type):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    public function execute() {
        return $this->stmt->execute();
    }

    public function fetchAll() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function rowCount() {
        $this->stmt->rowCount();
    }

    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    public function beginTransaction() {
        return $this->conn->beginTransaction();
    }

    public function endTransaction() {
        return $this->conn->commit();
    }

    public function cancelTransaction() {
        return $this->conn->rollBack();
    }

    public function debugDumpParameters() {
        return $this->stmt->debugDumpParams();
    }

    public function getCurrentPDO() {
        return $this->conn;
    }

    public function getError() {
        return $this->err;
    }

}