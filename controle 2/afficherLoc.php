<?php
include("db.php");
include("menu");

$numero = $conn->query("SELECT * FROM Camio");
$camio = $numero->fetchAll();

if (isset($_POST['btn']) ) {
    if ( !empty($_POST['couleur'])) {
    $couleur = $_POST['couleur'];
    $stmt = $conn->prepare("
        SELECT ca.numero AS numero,ca.couleur AS couleur,ca.prixLoc AS prix,l.dateLoc AS date,l.duree AS duree, (ca.prixLoc * l.duree) AS total_loc
        FROM Camio ca
        JOIN Location l ON ca.numero = l.numero
        WHERE ca.couleur = :couleur
        ORDER BY l.dateLoc DESC
    ");

    $stmt->execute([':couleur' => $couleur]);
    $infos = $stmt->fetchAll();
} }else {
    $stmt = $conn->query("
        SELECT ca.numero AS numero,ca.couleur AS couleur,ca.prixLoc AS prix,l.dateLoc AS date,l.duree AS duree,(ca.prixLoc * l.duree) AS total_location
        FROM Camio ca
        JOIN Location l ON ca.numero = l.numero
        ORDER BY l.dateLoc DESC
    ");

    $infos = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Locations</title>

    
</head>
<body>

<form method="POST">
    Filtre :
    <select name="couleur">
        <option value="">----choisi une couleur du camio------</option>
        <?php foreach($camio as $n){ ?>
            <option value="<?= $n['couleur'] ?>">
                <?= $n['couleur'] ?>
            </option>
        <?php } ?>
    </select>

    <button type="submit" name="btn">Filtrer</button>
</form>

<table border="1">
    <tr>
        <th>Numéro</th>
        <th>Couleur</th>
        <th>Prix Location</th>
        <th>Date</th>
        <th>Durée</th>
        <th>Total Location</th>
        <th>Action</th>
    </tr>

    <?php foreach($infos as $l){ ?>
    <tr>
        <td><?= $l['numero'] ?></td>
        <td><?= $l['couleur'] ?></td>
        <td><?= $l['prix'] ?></td>
        <td><?= $l['date'] ?></td>
        <td><?= $l['duree'] ?></td>
        <td><?= $l['total_location'] ?></td>
        <td>
            <a href="cancel.php?numero=<?= $l['numero'] ?>&date=<?= $l['date'] ?>"
               onclick="return confirm('Voulez-vous vraiment annuler cette location ?')">
                Annuler
            </a>
        </td>
    </tr>
    <?php } ?>
</table>

</body>
</html>