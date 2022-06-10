<?php


namespace application\controllers;

use application\models\UserModel;
use application\stmt\userResponse;

class DataController extends Controller {

    public function getUserInfo(){
        $receivedData = json_decode(file_get_contents('php://input'));
        $model = new UserModel();

        if ($results = $model->getUserInfo($receivedData)){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new userResponse($results[$i]);
            }
        }else{
            $responseData = new userResponse(false);
        }
        echo json_encode($responseData);
    }
}