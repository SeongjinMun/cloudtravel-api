<?php

namespace application\stmt;

class bannerResponse{
    public $title, $subtitle, $url;

    public function __construct($data){
        $this->title  = $data[0];
        $this->subtitle = $data[1];
        $this->url = $data[2];
    }
}