<?php

namespace application\controllers;

use application\models\UserModel;
use application\stmt\UserResponse;

class UserController extends Controller {

    public function synUser(){

        $model = new UserModel();

        if ($result = $model->getSynUser()){
            $responseData = new UserResponse($result);
            $responseData->type=200;
        }else{
            $responseData = new UserResponse($result);
            $responseData->type=202;
        }
        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    public function getUserInfo(){

        $model = new UserModel();

        if ($result = $model->getUserInfo()){
            $responseData = new UserResponse($result);
            $responseData->type=200;
        }else{
            $responseData = new UserResponse($result);
            $responseData->type=202;
        }
        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }
}