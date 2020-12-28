<?php
     function CheckLogin(){
        if(!isset($_SESSION["AdminLogin"])){
            $url=URL."Admin";
            header("Location: $url");
        }
    }
    function CheckLoginUser(){
        if(!isset($_SESSION["userNameLogin"])){
            $url=URL."TaiKhoan";
            header("Location: $url");
        }
    }
?>