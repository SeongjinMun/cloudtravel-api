<?php
namespace application\models;
use Exception;
use PDO;

class Model {
    public $conn;
    public function __construct(){
	try {
            $this->conn = new PDO("mysql:host=".DB_HOST.";"."dbname=".DB_NAME, DB_USER, DB_PASSWORD);
        } catch (Exception $e){
            echo "__DBconnError__connect Error";
        }
    }
}

