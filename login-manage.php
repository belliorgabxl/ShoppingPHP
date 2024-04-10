<?php

session_start();
include 'config.php';


$errors = array();

if (isset($_POST['login_user'])){
    $username = trim($_POST['username_log']);
    $password = trim($_POST['password_log']);
    if(empty($username)){
        array_push($errors);
    }
    if(empty($password)){
        array_push($errors);
    }
    if (count($errors)== 0){
        $query = "SELECT * FROM users WHERE username= '$username' AND password = '$password'";
        $result = mysqli_query($conn,$query);
        if(mysqli_num_rows($result) == 1){
            $_SESSION['username'] = $username;
            $_SESSION['token'] =  50000;
            $_SESSION['success'] = "Your are now loggin in";
            header("location: homepage.php");
        }else{
            header("location: index.php");
        }
    }
}



?>
