<?php


namespace application\models;


use mysql_xdevapi\Exception;

class UserModel extends Model {

    public function getSynUser($receivedData){

        print_r($_POST);

        $userName=$_POST['user'];

        $sql = "INSERT INTO user_info(username) VALUES(:UserName)";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":UserName", $userName, PDO::PARAM_STR);
            $stmt->execute();
            $result = $stmt->rowCount();
        }catch (Exception $e){
            return $result;
        }
        return $result;
    }

    public function getUserInfo(){
        $sql = "SELECT * FROM user_info";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array();
        }
        return $result;
    }

}