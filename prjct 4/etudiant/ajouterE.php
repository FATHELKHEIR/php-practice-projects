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

$sqlF = "SELECT * FROM filiere";
$stmtF = $pdo->query($sqlF);
$filiere = $stmtF->fetchAll();

if(isset($_POST['btn'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $age = $_POST['age'];
    $idF = $_POST['idF'];

    if(!empty($nom) && !empty($prenom) && !empty($age)) {
        $sql = "INSERT INTO etudiant (nom,prenom,age,idF) VALUES (?,?,?,?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$nom,$prenom,$age,$idF]);
        header("location: afficherE.php");
        exit();
    }else {
        echo 'tous les champs sont obligatoire';
    }
}
?>
<form method="POST">
    Nom:<input type="text" name="nom"> <br><br>
    Prenom:<input type="text" name="prenom"> <br><br>
    Age:<input type="number" name="age"><br><br>
    Filiere: <select name="idF">
        <?php foreach($filiere as $f) {?>
            <option value="<?=$f['idF']?>"><?=$f['nom_filiere']?></option>

        <?php }?>
        </select><br><br>
        <button type="submit" name="btn">Ajouter</button>
</form>
</body>
</html>