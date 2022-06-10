<?php


namespace application\controllers;


class ErrorController extends Controller {
    public function getErrorInfo(){
        echo json_encode("error");
    }
}