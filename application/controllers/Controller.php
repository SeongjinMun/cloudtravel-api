<?php
namespace application\controllers;

use application\models\UserModel;
use Exception;

session_start();

class Controller{

    //protected $userModel;

    public function __construct($pageType, $action){

        //$this->userModel  = new UserModel();
	
        if(isset($_POST)){
            //$_POST = postFilter($_POST);
        }

        try {
            $validateAction = false;
            foreach (get_class_methods($this) as $value){
                if ($action == $value){
                    $validateAction = true;
                }
            }
            if (!$validateAction){
                    throw new Exception();
            }
        }catch (Exception $e){
            if ($pageType  == 'error'){
                $action = 'getErrorInfo';
            }
        }

        if ($pageType == 'Health'){
            $action = 'getHealthCheck';
        }

        $this->$action();
    }

}

