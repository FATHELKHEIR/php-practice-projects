<?php
include("db.php");

if(isset($_GET['numero']) && isset($_GET['date']))
{
    $stmt = $conn->prepare("
        DELETE FROM Location WHERE numero = :numero AND dateLoc = :date
    ");
    $stmt->execute([
        ':numero' => $_GET['numero'],
        ':date' => $_GET['date']
    ]);
    header("Location: afficherLoc.php");
}
?>