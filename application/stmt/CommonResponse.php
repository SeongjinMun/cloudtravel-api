<?php

namespace application\stmt;

class commonResponse{
    public $status;

    public function __construct($data){
        $this->status = $data[0];
    }

}