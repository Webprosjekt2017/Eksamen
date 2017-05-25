<?php
use PHPUnit\Framework\TestCase;
/**
 * @codeCoverageIgnore
 */


/*
 * Dette er en klasse som bygger videre på PDO klassen.
 * Formålet er å gjøre det enklere for oss å lage spørringer mot databasen,
 * uten å måtte komplisere ting med binding, osv.
 */
class Database
{
    /** @var PDO  */
    private $conn;

    /** @var PDOStatement */
    private $stmt;

    private $err;

    public function __construct($host = Config::DB_HOST, $db = Config::DB_DATABASE, $user = Config::DB_USER, $pwd = Config::DB_PASSWORD)
    {
        $dsn = 'mysql:host=' . $host . ';dbname=' . $db . ';charset=utf8';
        $opt = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_TIMEOUT => "5",
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try{
            $this->conn = new PDO($dsn, $user, $pwd, $opt);
        } catch (PDOException $e) {
            $this->err = $e->getMessage();
        }
    }

    /*
     * Gjør klar spørringen.
     */
    public function query($qry){
        $this->stmt = $this->conn->prepare($qry);
    }

    /*
     * Oppdatert bind funksjon, så vi slipper å definere
     * hvilken type som skal bindes.
     */
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

    /*
     * Kjører spørringen.
     */
    public function execute() {
        return $this->stmt->execute();
    }

    /*
     * Kjører spørringen og returnerer alt den finner.
     */
    public function fetchAll() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /*
     * Kjører spørringen og returnerer det første den finner.
     */
    public function single() {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    /*
     * Antall rader som ble funnet.
     */
    public function rowCount() {
        $this->stmt->rowCount();
    }

    /*
     * Returnerer ID på siste spørring.
     */
    public function lastInsertId() {
        return $this->conn->lastInsertId();
    }

    /*
     * Starter en transaksjon.
     */
    public function beginTransaction() {
        return $this->conn->beginTransaction();
    }

    /*
     * Avslutter og kjører en transaksjon.
     */
    public function endTransaction() {
        return $this->conn->commit();
    }

    /*
     * Avbryter en transaksjon.
     */
    public function cancelTransaction() {
        return $this->conn->rollBack();
    }

    /*
     * Dumper spørring til output.
     */
    public function debugDumpParameters() {
        return $this->stmt->debugDumpParams();
    }

    /*
     * Returnerer nåværende tilkobling til db.
     */
    public function getCurrentPDO() {
        return $this->conn;
    }

    /*
     * Henter feilmelding.
     */
    public function getError() {
        return $this->err;
    }

}
// @codeCoverageIgnore