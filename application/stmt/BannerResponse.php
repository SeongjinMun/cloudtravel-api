<?php

namespace application\stmt;

class bannerResponse{
    public $title, $url, $link, $courseId;

    public function __construct($data){
        $this->courseId = $data[0];
        $this->title  = $data[1];
        $this->link = $data[2];
        $this->url = $data[3];
    }

}