<?php
session_start();
require("../config/connexion.php");

if(isset($_POST['btn'])) {
    $login = $_POST['login'];
    $motPass = $_POST['motPass'];

    if(!empty($login) && !empty($motPass)) {
        $sql = "SELECT * FROM utilisateur WHERE login=? AND motPasse=?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$login, $motPass]);

        $user = $stmt->fetch();

        if($user) {
            
            $_SESSION['user'] = $user;

            if($user['role'] == "admin") {
                header("location: adminPage.php");
                exit();
            }else {
                header("location: userPage.php");
                exit();
            }
        }else {
            echo "login ou le mot de pass incorrect!";
        }
    }else {
        echo 'Tous les champs sont obligatoire';
    }
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        Login: <input type="text" name="login"><br><br>
        Mot de passe: <input type="password" name="motPass"><br><br>
        <button type="submit" name="btn">Connecter</button>
    </form>
</body>
</html>