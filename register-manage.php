<?php

include 'config.php';

$username = trim($_POST['username']);
$password = trim($_POST['password']);
$Cpassword = trim($_POST['Cpassword']);
$email = trim($_POST['email']);

if (!empty($username)){
    if ($password == $Cpassword){
        $query = mysqli_query($conn ,"INSERT INTO users (username,password, email )
VALUES ('{$username}','{$password}','{$email}')") or die("เข้าถึงข้อมูลไม่ได้");
    }
    else{
        header('location:'.$base_url.'/index.php');
    }
}

mysqli_close($conn);

if($query){
    $_SESSION['message'] = 'Register success';
    header('location:'.$base_url.'/index.php');
}
else{
    $_SESSION['message'] = 'Fails';
    header('location:'.$base_url.'/index.php');
}
?>