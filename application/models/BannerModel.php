<?php

namespace application\models;

use mysql_xdevapi\Exception;

class BannerModel extends Model{

    public function getBannerList(){
        $sql = "SELECT
                course_id,
                course_title,
                course_subtitle,
                course_view
                FROM course_main
	            WHERE course_tag='64583a93f8b8c1be92b57f0b0f1a1d75a8d63d9807d809a1150cd7d6cfcff385';";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(4);
        }
        return $result;
    }

}