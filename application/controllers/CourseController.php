<?php

namespace application\controllers;

use application\models\CourseModel;
use application\models\UserModel;
use application\stmt\userResponse;
use application\stmt\CourseResponse;

class CourseController extends Controller {

    public function test(){
        echo "CourseController OK";
    }

    public function courseList(){
        $model = new CourseModel();
        if ($results = $model->getCourseList()){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new courseResponse($results[$i]);
            }
        }else{
            $responseData = new courseResponse(false);
        }


        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    public function mainTopCourseList(){
        $model = new CourseModel();
        if ($results = $model->getMainTopCourseList()){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new courseResponse($results[$i]);
            }
        }else{
            $responseData = new courseResponse(false);
        }
        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    public function mainMiddleCourseList(){
        $model = new CourseModel();
        if ($results = $model->getMainMiddleCourseList()){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new courseResponse($results[$i]);
            }
        }else{
            $responseData = new courseResponse(false);
        }
        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    public function MainBottomCourseList(){
        $model = new CourseModel();
        if ($results = $model->getMainBottomCourseList()){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new courseResponse($results[$i]);
            }
        }else{
            $responseData = new courseResponse(false);
        }
        echo json_encode($responseData);
    }


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
