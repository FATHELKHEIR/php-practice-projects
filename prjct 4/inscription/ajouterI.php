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

    $sqlI = "SELECT * FROM etudiant";
    $stmtI = $pdo->query($sqlI);
    $etudiants = $stmtI->fetchAll();

    if(isset($_POST['btn'])) {
        $date = $_POST['date_inscription'];
        $idE = $_POST['idE'];

        if(!empty($date)) {
            $sql = "INSERT INTO inscription(date_inscription, idE) VALUES (?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$date, $idE]);
            header("location: afficherI.php");
            exit();

        }else{
            echo 'tous les champs sont obligatoire';
        }
    }
    ?>

    <h2>Ajouter un inscription</h2>
    <form method="POST">
        Date d'inscription: <input type="date" name="date_inscription" ><br><br>
        Etudiant: <select name="idE">
            <?php foreach($etudiants as $e) {?>
                <option value="<?= $e['idE']?>">
                    <?= $e['nom'] ?> <?= $e['prenom'] ?>
                </option>

                <?php }?>
        </select><br><br>
        <button type="submit" name="btn">Ajouter</button>

    </form>
</body>
</html>