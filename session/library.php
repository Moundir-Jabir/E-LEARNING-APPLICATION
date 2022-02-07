<?php
    function authenticate($email, $password){
        return ($email === EMAIL && $password === PASSWORD);
    }

    function is_authenticate(){
        return isset($_SESSION['email']);
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