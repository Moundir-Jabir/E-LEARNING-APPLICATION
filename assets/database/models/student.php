<?php
require('data_provider.php');
class Student extends DataProvider {
    public function addStudent($name, $email, $phone){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "INSERT INTO students (name, email, phone) VALUES (:name, :email, :phone)";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone
        ]);
        $smt = null;
        $db = null;
    }

    public function getStudents(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT * FROM students');
        $data = $query->fetchAll(PDO::FETCH_OBJ);
        $query = null;
        $db = null;
        return $data;
    }

    public function getStudentById($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM students WHERE enroll_number = :id";
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

    public function updateStudent($id, $name, $email, $phone, $solde){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "UPDATE students SET name = :name, email = :email, phone = :phone, solde = :solde WHERE enroll_number = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":name" => $name,
            ":email" => $email,
            ":phone" => $phone,
            ":solde" => $solde,
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }

    public function deleteStudent($id){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "DELETE FROM students WHERE enroll_number = :id";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":id" => $id
        ]);
        $smt = null;
        $db = null;
    }
}