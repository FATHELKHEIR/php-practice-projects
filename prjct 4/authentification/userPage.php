<?php
session_start();
require("../config/connexion.php");

if(!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}
if($_SESSION['user']['role'] != "user") {
    header("location: login.php");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Bonjour user</h1>
    <h3>Affichage filieres</h3>
    <a href="/serie8/filiere/afficherF.php">Voir les filieres</a><br><br>

    <h3>Affichage etudiants</h3>
    <a href="/serie8/etudiant/afficherE.php">Voir les etudiants</a><br><br>

    <h3>Affichage inscriptions</h3>
    <a href="/serie8/inscription/afficherI.php">Voir les inscriptions</a><br><br>

    <button><a href="/serie8/logout.php">Deconnexion</a></button>
</body>
</html>