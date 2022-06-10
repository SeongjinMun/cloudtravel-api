<?php
namespace application\models;

use mysql_xdevapi\Exception;

class CourseModel extends Model{

    // mysql_insert_id(); <- insert 직후의 PK값

    public function getPopularCourse(){
        $sql = "";

    }

    public function getCourse($receivedData){

        $id = $receivedData->id;
        $sql = "SELECT course_title, course_subtitle, corse_view FROM course_main WHERE course_id=:bid";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":bid", $argId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(3);
        }
        return $result;

    }

}