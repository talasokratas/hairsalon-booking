<?php
/**
 * Created by PhpStorm.
 * User: ritmas
 * Date: 18/02/2019
 * Time: 16:36
 */

class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    private $dbh;
    private $stmt;
    private $error;

    /**
     * Database constructor.
     *
     * On new instance makes connection to DB
     */
    public function __construct(){
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbname;
        $options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        );

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $options);
        } catch (PDOException $e) {
            $this->error = $e ->getMessage();
            echo $this->error;
        }
    }

    /**
     * @param $sql
     */
    public function query($sql){
        $this->stmt = $this->dbh->prepare($sql);
    }

    /**
     * @param $param
     * @param $value
     * @param null $type
     */
    public function bind ($param, $value, $type = null){
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOR;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
            }
        }

        $this->stmt->bindValue($param, $value, $type);
    }

    /**
     * @return mixed
     */
    public function execute(){
        return $this->stmt->execute();
    }

    /**
     * @return mixed
     */
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_OBJ);
    }

    /**
     * @return mixed
     */
    public function rowCount() {
        return $this->stmt->rowCount();
    }
}