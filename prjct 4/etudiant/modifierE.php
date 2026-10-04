<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require("../config/connexion.php");
          require("../config/session_admin.php");

    if(isset($_GET['id'])) {
        $id = $_GET['id'];
    }else{
        echo' ID introuvable';
        exit();
    }
    $sql = "SELECT * FROM etudiant WHERE idE=?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$id]);

    $e = $stmt->fetch();

    if(!$e){
    echo "Etudiant introuvable";
    exit();
    }

    $sqlF = "SELECT * FROM filiere";
    $stmtF = $pdo->query($sqlF);
    $filieres = $stmtF->fetchAll();

    if(isset($_POST['btn'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $age = $_POST['age'];
        $idF = $_POST['idF'];

        if(!empty($nom) && !empty($prenom) && !empty($age)) {

            $sql = "UPDATE etudiant SET nom=?, prenom=?, age=?, idF=? WHERE idE=?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$nom, $prenom, $age, $idF, $id]);

            header("location: afficherE.php");
            exit();
        } else {
            echo'Tous les champs sont obligatoire';
        }

    }?>
    <h2>Modifier etudiant</h2>
    <form method="POST">
    Nom:<input type="text" name="nom" value="<?=$e['nom']?>"> <br><br>
    Prenom:<input type="text" name="prenom" value="<?= $e['prenom']?>"> <br><br>
    Age:<input type="number" name="age" value="<?= $e['age']?>"><br><br>
    Filiere: <select name="idF">

                <?php foreach($filieres as $f){ ?>

                <option value="<?=$f['idF']?>"
                <?= ($f['idF'] == $e['idF']) ? 'selected' : '' ?>>

                <?=$f['nom_filiere']?>

                 </option>

            <?php } ?>

</select><br><br>
        <button type="submit" name="btn">Modifier</button>
</form>

</body>
</html>