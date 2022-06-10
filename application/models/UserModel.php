<?php


namespace application\models;


use mysql_xdevapi\Exception;

class UserModel extends Model {
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