<?php
$host="localhost";
$dbname="ecole";
$user="root";
$password="";

try {
    $pdo = new PDO ("mysql:host=$host;dbname=$dbname;charset=utf8",$user, $password,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

} catch (PDOException $e) {
    echo ("Connection failed: " .$e->getMessage());
}
?>