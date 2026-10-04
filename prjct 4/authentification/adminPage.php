<?php
session_start();
require("../config/connexion.php");

if(!isset($_SESSION['user'])) {
    header("location: login.php");
    exit();
}
if($_SESSION['user']['role'] != 'admin') {
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
    <style>
        a {
            padding: 10px;
        }
    </style>
</head>
<body>
    <h1>Hello admin</h1>
    <h3>Gestion les filieres</h3>
    <a href="/serie8/filiere/ajouterF.php">Ajouter</a>
    <a href="/serie8/filiere/afficherF.php">Afficher</a>

    <h3>Gestion les etudiants</h3>
    <a href="/serie8/etudiant/ajouterE.php">Ajouter</a>
    <a href="/serie8/etudiant/afficherF.php">Afficher</a>

    <h3>Gestion les inscriptions</h3>
    <a href="/serie8/inscription/ajouterI">Ajouter</a>
    <a href="/serie8/ inscription/afficherI">Afficher</a><br><br>


    <button><a href="/serie8/logout.php">Deconnexion</a></button>
</body>
</html>