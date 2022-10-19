<?php

namespace application\controllers;

use application\models\UserModel;
use application\stmt\UserResponse;

class UserController extends Controller {

    public function synUser(){

//        echo $receivedData = json_decode(file_get_contents('php://input'));
//        echo "okok";
//        print_r($_POST);
//        print_r($_GET);

        $model = new UserModel();

        $data[0][0]="test";
        $data[0][1]="token";
        $data[0][2]="nick";

//        $data[0][3]="birth" . " | " . $_POST['email'] . " | ";
        $data[0][3]="";


        $data[0][4]=3;
        $data[0][5]=4;
        $data[0][6]="test1";

        $responseData = new userResponse($data[0]);

        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);

//        $model = new UserModel();
//        if ($results = $model->getSynUser()){
//            for ($i = 0; $i < count($results); $i++){
//                $responseData = new commonResponse($results[$i]);
//            }
//        }else{
//            $responseData = new commonResponse(false);
//        }
    }

    public function getUserInfo(){
        $receivedData = json_decode(file_get_contents('php://input'));
        $model = new UserModel();
    }
}