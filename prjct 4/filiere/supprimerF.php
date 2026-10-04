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

if(isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    echo'ID manquant';
    exit();
}

$sql = "DELETE FROM filiere WHERE idF = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);

echo "Suppression réussie";
?>
</body>
</html>