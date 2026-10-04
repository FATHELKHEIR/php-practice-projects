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
    require("../config/session_user.php");
    
    $sqlF = "SELECT * FROM filiere";
    $stmtF = $pdo->query($sqlF);
    $filieres = $stmtF->fetchAll();


    
    $sql = "SELECT inscription.* , etudiant.nom, etudiant.prenom , filiere.nom_filiere FROM inscription
    JOIN etudiant
    ON inscription.idE = etudiant.idE
    
    JOIN filiere
    ON etudiant.idF = filiere.idF WHERE 1";
    
    if(!empty($_GET['date1']) && (!empty($_GET['date2']))) {
        $sql.=" AND date_inscription BETWEEN :date1 AND :date2";
    }

    
    if(!empty($_GET['idF'])) {
        $sql.=" AND filiere.idF = :idF";
    }

    $stmt = $pdo->prepare($sql);

    if(!empty($_GET['date1']) && (!empty($_GET['date2']))) {
        $stmt->bindvalue(':date1', $_GET['date1']);
        $stmt->bindvalue(':date2', $_GET['date2']);
    }

    if(!empty($_GET['idF'])) {
        $stmt->bindvalue(':idF', $_GET['idF']);
    }
    $stmt->execute();
    $inscriptions = $stmt->fetchAll();
    ?>
    <form method="GET">
        Date debut: <input type="date" name="date1"><br><br>
        Date fin: <input type="date" name="date2"><br><br>
        Filiere: <select name="idF">
            <option value="">-- toutes --</option>
            <?php foreach($filieres as $f) {?>
                    <option value="<?= $f['idF']?>"><?=$f['nom_filiere']?></option>
            <?php }?>
                </select><br><br>
                <button type="submit">Filtrer</button>
    </form>


    <h2>Liste des inscriptions</h2>
    <table border="1" cellpadding="10">
        <tr>
            <th>Id</th><th>Nom de l'etudiant</th><th>Filiere</th><th>Date d'inscription</th>
        </tr>
        <?php foreach($inscriptions as $i) {?>
            <tr>
                <td><?= $i['idI'] ?></td>
                <td><?= $i['nom']." ". $i['prenom'] ?></td>
                <td><?= $i['nom_filiere'] ?></td>
                <td><?= $i['date_inscription'] ?></td>
            </tr>
        <?php }?>
    </table><br>
    <a href="ajouterI.php">Ajouter un inscription</a>

</body>
</html>