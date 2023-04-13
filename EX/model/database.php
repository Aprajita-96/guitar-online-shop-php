<?php

$username="root";
$password="";

class GuitarDatabase{
    private $dsn="mysql:host=localhost;dbname=my_guitar_shop1";
    private static $instance=null;

    public static function getInstance(){
        return self::$instance===null ? new GuitarDatabase() : self::$instance;
    }

    public function connect(){
        try{
            global $username;
            global $password;
            return new PDO($this->dsn,$username,$password);
        }
        catch(PDOException $ex){
            $error=$ex->getMessage();
            echo "<p> Error Message: $error </p>";
        }
    }
}
$database=GuitarDatabase::getInstance();
$db=$database->connect();
?>