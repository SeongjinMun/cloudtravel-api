<?php

namespace application\stmt;

class commonResponse{
    public $type;

    public function __construct($data){
        $this->type = $data;
    }

}