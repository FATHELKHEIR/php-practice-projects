<?php
require("../config/connexion.php");
require("../config/session_admin.php");
if(isset($_GET['id'])) {
    $id = $_GET['id'];
}else{
    echo 'id introuvable';
    exit();
}
$sql = "DELETE FROM etudiant WHERE idE=?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header("location: afficherE.php");
exit();

?>