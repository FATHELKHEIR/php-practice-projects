<?php
require("/serie8/session_admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
require("../config/connexion.php");
require("../config/session_admin.php");

if(isset($_POST['nom_filiere'])){
    $nom = $_POST['nom_filiere'];

    if(!empty($nom)){
        $sql = "INSERT INTO filiere(nom_filiere) VALUES(:nom)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(["nom"=>$nom]);

        echo "Filière ajoutée avec succès";
    } else {
        echo "Le champ est obligatoire";
    }
}
?>

<form method="POST">
    Nom filière: <input type="text" name="nom_filiere">
    <button type="submit">Ajouter</button>
</form>
</body>
</html>