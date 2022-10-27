<?php


namespace application\models;


use mysql_xdevapi\Exception;

class UserModel extends Model {

    public function getSynUser(){

        $requestType = $_POST['type'];
        $userName  = $_POST['email'];
        $userToken = $_POST['token'];


        switch ($requestType){
            case USER_REGISTERED :
                $sql = "INSERT INTO user_info(user_email, user_token) VALUES('$userName', '{$userToken}')";
                try {
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    return REQUEST_OK;
                }catch (Exception $e){
                    return REQUEST_ERROR;
                }
            break;
            case USER_LOGOUT :
                $userToken = "";
            case USER_REFRESH_TOKEN :
                $sql = "UPDATE user_info SET user_token='{$userToken}' WHERE user_email='{$userName}'";
                try {
                    $stmt = $this->conn->prepare($sql);
                    $stmt->execute();
                    return REQUEST_OK;
                }catch (Exception $e){
                    return REQUEST_ERROR;
                }
            break;
            default :
                return REQUEST_ERROR;
        }

    }

    public function getUserInfo(){

        $userName  = $_POST['email'];
        $userToken = $_POST['token'];

        $sql = "SELECT * FROM user_info WHERE user_email='{$userName}' AND user_token='{$userToken}'";
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