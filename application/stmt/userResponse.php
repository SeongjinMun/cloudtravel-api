<?php
namespace application\stmt;

class UserResponse{
    public $email, $name;
    public function __construct($data){
        $this->email  = $data[1];
        $this->name = $data[3];
    }
}