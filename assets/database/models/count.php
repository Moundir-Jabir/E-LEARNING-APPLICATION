<?php
require('data_provider.php');
class Count extends DataProvider {
    public function countStudent(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT COUNT(*) FROM students');
        $data = $query->fetchColumn();
        $query = null;
        $db = null;
        return $data;
    }

    public function countPayment(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT SUM(amount_paid) FROM payments');
        $data = $query->fetchColumn();
        $query = null;
        $db = null;
        return $data;
    }

    public function countCourse(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT COUNT(*) FROM courses');
        $data = $query->fetchColumn();
        $query = null;
        $db = null;
        return $data;
    }

    public function countUser(){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $query = $db->query('SELECT COUNT(*) FROM comptes');
        $data = $query->fetchColumn();
        $query = null;
        $db = null;
        return $data;
    }
}