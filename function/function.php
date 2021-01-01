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
    function clean($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
     
        return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
     }
?>