<?php
session_start();
include 'config.php';

if(!empty($_POST['coin'])){
        if(isset($_POST['coin'])){
        $_SESSION['token'] += $_POST['coin'];
        $_SESSION['message']  =  "Add money Succes";
        header('location: ' . $base_url . "/token.php");
    }
}
else{
    $_SESSION['message']  =  "No money";
    header('location: ' . $base_url . "/token.php");
}

?>