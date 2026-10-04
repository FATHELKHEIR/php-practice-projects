
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require("../config/connexion.php");
          require("../config/session_user.php");


    $sql = "SELECT etudiant.*,filiere.nom_filiere FROM etudiant
    JOIN filiere
    ON etudiant.idF = filiere.idF";


    $stmt = $pdo->query($sql);
    $etudiants = $stmt->fetchAll();
    ?>
    <table border="1" cellpading="10">
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Age</th>
            <th>Filiere</th>
            <th>Action</th>
        </tr>
        <?php foreach($etudiants as $e) {?>
        <tr>
            <td><?= $e['idE'] ?></td>
            <td><?= $e['nom'] ?></td>
            <td><?= $e['prenom'] ?></td>
            <td><?= $e['age'] ?></td>
            <td><?= $e['nom_filiere'] ?></td>

            <td>
                <?php if($_SESSION['user']['role'] == 'admin'){ ?>

                <a href="modifierE.php?id=<?= $e['idE']?>">Modifier</a>
                <a href="supprimerE.php?id=<?= $e['idE']?>"onclick="return confirm('supprimer cet etudiant')">Supprimer</a>

                <?php } ?>
            </td>
        </tr>
        <?php }?>
    </table><br>
    <a href="ajouterE.php">Ajouter un etudiant</a>
</body>
</html>