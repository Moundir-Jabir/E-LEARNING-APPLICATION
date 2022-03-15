<?php
require('data_provider.php');
class Compte extends DataProvider {
    public function getCompteByEmailAndPassword($email, $password){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "SELECT * FROM comptes WHERE email = :email && password = :password";
        $smt = $db->prepare($sql);
        $smt->execute([
            ":email" => $email,
            ":password" => $password
        ]);
        $data = $smt->fetch(PDO::FETCH_OBJ);
        $smt = null;
        $db = null;
        return $data;
    }

    public function addCompte($name, $email, $password){
        $db = $this->connect();
        if($db == null){
            return;
        }
        $sql = "INSERT INTO comptes (name, email, password) VALUES (:name, :email, :password)";
        $smt = $db->prepare($sql);
        try{
            $smt->execute([
                ":name" => $name,
                ":email" => $email,
                ":password" => $password
            ]);
            return "bien";
        }
        catch(Exception $e){
            return $e;
        }
        $smt = null;
        $db = null;
    }
}