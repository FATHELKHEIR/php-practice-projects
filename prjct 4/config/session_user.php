<?php

session_start();

if(!isset($_SESSION['user'])){

    header("Location: /serie8/authentification/login.php");

    exit();

}

?>