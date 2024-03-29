<?php

namespace application\stmt;

class courseResponse{
    public $id, $rating, $views, $title, $subtitle, $url, $tags;

    public function __construct($data){
        $this->id  = $data[0];
        $this->rating = $data[1];
        $this->views = $data[2];
        $this->title = $data[3];
        $this->subtitle = $data[4];
        $this->url = $data[5];
        str_replace("전국", "", $data[6]);
        str_replace(",", " #", $data[6]);
        $this->tags = $data[6];
    }
}