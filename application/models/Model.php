<?php
namespace application\models;
use Exception;
use PDO;

class Model {
    public $conn;
    public function __construct(){
	try {
            $this->conn = new PDO("mysql:host=".DB_HOST.";"."dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e){
            echo 'DBconnError: ' . $e->getMessage() . ', location: ' .
            $e->getFile() . ':' . $e->getLine();
        }
    }
}

