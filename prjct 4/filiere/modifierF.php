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
if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    echo "ID manquant";
    exit(); 
}
$sql = "SELECT * FROM filiere WHERE idF=:id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$f = $stmt->fetch();

if(isset($_POST['nom_filiere'])){
    $id = $_GET['id'];
    $nom = $_POST['nom_filiere'];

    $sql = "UPDATE filiere SET nom_filiere = :nom WHERE idF = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nom' => $nom, 'id' => $id]);

    header("Location: afficherF.php");
    exit();

    echo "Modification réussie";
}
?>

<form method="POST">
    Nom filière: <input type="text" name="nom_filiere" value="<?= $f['nom_filiere'] ?>">
    <button type="submit">Modifier</button>
</form>
</body>
</html>