<?php
namespace application\stmt;

class userResponse{
    public $email, $token, $nickname, $birthdate, $sex, $exp, $view;
    public function __construct($data){

        $this->email  = $data[0];
        $this->token = $data[1];
        $this->nickname = $data[2];
        $this->birthdate = $data[3];
        $this->sex = $data[4];
        $this->exp = $data[5];
        $this->view = $data[6];
    }
}
