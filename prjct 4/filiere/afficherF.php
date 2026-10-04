
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

$sql = "SELECT * FROM filiere";
$stmt = $pdo->query($sql);
$filiere = $stmt->fetchAll();
?>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom filière</th>
        <th>Actions</th>
    </tr>

    <?php foreach($filiere as $f): ?>
    <tr>
        <td><?= $f['idF'] ?></td>
        <td><?= $f['nom_filiere'] ?></td>
        <td>
            <?php if($_SESSION['user']['role'] == 'admin'){ ?>

            <a href="modifierF.php?id=<?= $f['idF'] ?>">Modifier</a>
            <a href="supprimerF.php?id=<?= $f['idF'] ?>" onclick="return confirm('supprimer cet filiere')">Supprimer</a>

            <?php } ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

</body>
</html>