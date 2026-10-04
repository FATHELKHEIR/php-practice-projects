<?php
include("db.php");
include("menu.php");

$cin=$conn->query("SELECT*FROM Client");
$client=$cin->fetchAll();

$numero=$conn->query("SELECT*FROM Camio");
$camio=$numero->fetchAll();

if(isset($_POST['btn'])){
$cin=$_POST['cin'];
$numero=$_POST['numero'];
$date=$_POST['date'];
$duree=$_POST['duree'];

if(!empty($cin)&&!empty($numero)&&!empty($date)&&!empty($duree)){
   $stmt=$conn->prepare("INSERT INTO Location(cin,numero,dateLoc,duree)VALUES(:cin,:numero,:dateLoc,:duree)");
   $stmt->execute([
   ':cin'=>$cin,
   ':numero'=>$numero,
   ':dateLoc'=>$date,
   ':duree'=>$duree]);
echo"Location ajoutée";
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>AjouterLocation</title>
</head>
<body>

<form method="POST">
  <br><br>CIN:
   <select name="cin">
   <option value="">----ChoisirCIN----</option>
<?php foreach($client as$c){?>
  <option value="<?=$c['cin']?>"><?=$c['cin']?></option>
<?php } ?>
   </select>
  <br><br>
   Numéro camion:
   <select name="numero">
    <option value="">----ChoisirNuméro----</option>
<?php foreach($camio as$n){?>
   <option value="<?=$n['numero']?>"><?=$n['numero']?></option>
<?php } ?>
   </select>
   <br><br>

    Date:
   <input type="date" name="date">
   <br><br>
    Durée:
   <input type="number" name="duree" min="1">

   <br><br>

   <button type="submit" name="btn">Ajouter</button>

   </form>

</body>
</html>