<?php
require('data_provider.php');
class Course extends DataProvider {
    public function addCourse($title, $description, $price){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "INSERT INTO courses (title, description, price) VALUES (:title, :description, :price)";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":title" => $title,
            ":description" => $description,
            ":price" => $price
        ]);
        $smt = null;
        $db = null;
    }

    public function getCourses(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT * FROM courses');
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $query = null;
        $db = null;
        return $data;
    }

    public function getCourseById($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM courses WHERE course_number = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $data = $smt->fetch(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        if(!$data){
            return "Data not found";
        }
        return $data;
    }

    public function updateCourse($id, $title, $description, $price){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "UPDATE courses SET title = :title, description = :description, price = :price WHERE course_number = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":title" => $title,
            ":description" => $description,
            ":price" => $price,
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }

    public function deleteCourse($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "DELETE FROM courses WHERE course_number = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }
}