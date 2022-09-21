<?php

namespace application\controllers;

class HealthController extends Controller{
    public function getHealthCheck(){
        echo "health ok";
    }
}