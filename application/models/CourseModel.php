<?php
namespace application\models;

use mysql_xdevapi\Exception;

class CourseModel extends Model{

    public function getCourseList($receivedData){
        $sql = "SELECT course_title, course_subtitle, corse_view FROM course_main WHERE course_id=:bid";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(":bid", $argId, PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

    public function getMainTopCourseLis($receivedData){
        $sql = "SELECT 
                course_title, course_subtitle, corse_view
                WHERE course_id = 
                (
                    SELECT A.course_id 
                    FROM course_tag A JOIN tag_stat B
                    ON B.tag_id = A.tag_id
                    ORDER BY B.tag_count DESC LIMIT 0,0
                )";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

    public function getMainMiddleCourseList($receivedData){
        $sql = "SELECT 
                course_title, course_subtitle, corse_view
                WHERE course_id = 
                (
                    SELECT A.course_id 
                    FROM course_tag A JOIN tag_stat B
                    ON B.tag_id = A.tag_id
                    ORDER BY B.tag_count DESC LIMIT 1,1
                )";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

    public function getMainBottomCourseList($receivedData){
        $sql = "SELECT 
                course_title, course_subtitle, corse_view
                WHERE course_id = 
                (
                    SELECT A.course_id 
                    FROM course_tag A JOIN tag_stat B
                    ON B.tag_id = A.tag_id
                    ORDER BY B.tag_count DESC LIMIT 2,2
                )";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

}