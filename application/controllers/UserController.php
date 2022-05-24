<?php


namespace application\controllers;

use application\models\UserModel;

class UserController extends Controller {
    public function getUserInfo(){
        $receivedData = json_decode(file_get_contents('php://input'));
        $model = new UserModel();

    }
}