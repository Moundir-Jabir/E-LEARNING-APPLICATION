<?php

    function authenticate($email, $password){
        require(dirname(__FILE__) . '/../assets/database/models/compte.php');
        $item = new Compte();
        $data = $item->getCompteByEmailAndPassword($email, $password);
        if(!$data){
            return false;
        }else{
            $_SESSION['user'] = $data;
            return true;
        }
    }

    function is_authenticate(){
        return isset($_SESSION['user']);
    }

    function redirection_login(){
        if(!is_authenticate()){
            header("Location: ../index.php");
            die();
        }
    }

    function redirection_admin(){
        if(is_authenticate()){
            header("Location: assets/home.php");
            die();
        }
    }
?>