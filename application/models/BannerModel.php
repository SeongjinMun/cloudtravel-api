<?php

namespace application\models;

use mysql_xdevapi\Exception;

class BannerModel extends Model{
    public function getBannerList(){
        $sql = "SELECT B.course_title, B.course_subtitle, B.corse_view
                FROM course_sub B JOIN course_main A
                ON B.course_id = A.course_id
                WHERE B.course_id=0";
        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(3);
        }
        return $result;
    }

}