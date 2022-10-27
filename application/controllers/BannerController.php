<?php

namespace application\controllers;

use application\models\BannerModel;
use application\stmt\BannerResponse;


class BannerController extends Controller{

    public function mainbannerList(){
        $model = new BannerModel();
        if ($results = $model->getBannerList()){
            for ($i = 0; $i < count($results); $i++){
                $responseData[] = new bannerResponse($results[$i]);
            }
        }else{
            $responseData = new bannerResponse(false);
        }
        echo json_encode($responseData, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

}