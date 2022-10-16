<?php
namespace application\models;

use mysql_xdevapi\Exception;
use function Sodium\add;

class CourseModel extends Model{

    public function getCourseList(){

        $start = $_GET["page"] * 8;
        $limit = 8;
        $tagQuery = "";
        $titleQuery = "";

        if ($_GET['tags'] != ''){
            $tags = explode(",", $_GET['tags']);

            for ($i=0; $i<count($tags); $i++){
                $tagQuery .= " AND tag_stat.tag_name='{$tags[$i]}'";
            }
        }

        if ($_GET['title'] != ''){
            $titleQuery .= " WHERE course_main.course_title LIKE '%{$_GET['title']}%'";
        }

        $sql = "SELECT
                course_main.course_id,
                course_main.course_rate,
                course_main.course_views,
                course_main.course_title,
                course_main.course_subtitle,
                course_main.course_view,
                course_main.course_tag
                FROM course_tag
                INNER JOIN tag_stat
                ON tag_stat.tag_name='전국' AND course_tag.tag_id = tag_stat.tag_id {$tagQuery}
                INNER JOIN course_main
                ON course_main.course_id = course_tag.course_id 
                {$titleQuery}
                ORDER BY course_tag DESC LIMIT {$start}, {$limit};";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }



    public function getMainTopCourseList(){
        $sql = "SELECT 
                course_main.course_id,
                course_main.course_rate,
                course_main.course_views,
                course_main.course_title,
                course_main.course_subtitle,
                course_main.course_view,
                course_main.course_tag
                FROM course_main
                ORDER BY course_views DESC LIMIT 0,5";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

    public function getMainMiddleCourseList(){
        $sql = "SELECT
                course_main.course_id,
                course_main.course_rate,
                course_main.course_views,
                course_main.course_title,
                course_main.course_subtitle,
                course_main.course_view,
                course_main.course_tag,
	            COUNT(course_main.course_id) AS cnt
                FROM course_main
                INNER JOIN course_review
                ON course_main.course_id=course_review.course_id
	            GROUP BY course_main.course_id
	            ORDER BY cnt DESC LIMIT 0,5";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();
        }catch (Exception $e){
            return array(7);
        }
        return $result;
    }

    public function getMainBottomCourseList(){
        $sql = "SELECT 
                course_main.course_id,
                course_main.course_rate,
                course_main.course_views,
                course_main.course_title,
                course_main.course_subtitle,
                course_main.course_view,
                course_main.course_tag
                FROM course_main
                ORDER BY course_rate DESC LIMIT 0,5";

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