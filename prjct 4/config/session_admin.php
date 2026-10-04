<?php
session_start();

if(!isset($_SESSION['user'])) {
    header("location: serie8/authentification/login.php");
    exit();
}
if($_SESSION['user']['role'] != 'admin') {
    header("location: /serie8/authentification/login.php");
    exit();
}
?>