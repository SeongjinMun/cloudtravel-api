<?php
namespace application\stmt;

class userResponse{
    public $email, $token, $nickname, $birthdate, $sex, $exp, $view, $type;
    public function __construct($data){

        $this->email = isset($data[0]) ? $data[0] : '';
        $this->token = isset($data[1]) ? $data[0] : '';
        $this->nickname = isset($data[2]) ? $data[0] : '';
        $this->birthdate = isset($data[3]) ? $data[0] : '';
        $this->sex = isset($data[4]) ? $data[0] : 0;
        $this->exp = isset($data[5]) ? $data[0] : 0;
        $this->view = isset($data[6]) ? $data[0] : '';
        $this->type = isset($data[7]) ? $data[0] : 202;
    }
}
