<?php
session_start();
include 'config.php';

unset($_SESSION['amount_before']);
unset($_SESSION['discount']);
unset($_SESSION['amount_after']);

$_SESSION['message']  =  "Cart Update Success";
header('location: ' . $base_url . "/homepage.php");

?>