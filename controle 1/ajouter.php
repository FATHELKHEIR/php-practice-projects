<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        code : <input type="number" name="code"><br><br>
        titre : <input type="text" name="titre"><br><br>
        <select name="categorie" >
            <option value="">selectionner une categorie</option>
            <option value="novel">une nouvelle</option>
            <option value="manga">manga</option>
        </select><br><br>
        prix unitaire : <input type="number" name="price"><br><br>
        quantite vendue : <input type="number" name="quantite"><br><br>
        <button type="submit" name="btn"> Ajouter</button>
        <a href="afficher.php"><button type="button">Afficher livres</button></a>
    </form>
    <?php 
    if (isset($_POST['btn'])) {
        if (empty($_POST['code']) || empty($_POST['titre']) || empty($_POST['categorie']) || empty($_POST['price']) || empty($_POST['quantite'])) {
           echo "tous les champs sont obligatoires";
           exit;
        }

       if ($_POST['price'] < 0 || $_POST['quantite'] < 0){
          echo "le prix et la quantite doivent etre positive";
          exit;
        }

        $code = $_POST['code'];
        $titre = $_POST['titre'];
        $categorie = $_POST['categorie'];
        $price = $_POST['price'];
        $quantite = $_POST['quantite'];
        $total = $price * $quantite;

        $exist = false;
        $file = fopen("listeLivre.txt", "r");
        

        while ($line = fgets($file)) {
           $contenu = explode("-", $line);
           if ($contenu[0] == $code) {
               $exist = true;
               echo "le code existe deja";
               fclose($file);
               break;
            }
        }

        if ($exist == false) {
           $file = fopen("listeLivre.txt", "a");
           $new = "$code-$titre-$categorie-$price-$total\n";
           fwrite($file, $new);
           echo "le livre a ete ajoute avec succes";
           fclose($file);

        }

    }
    ?>
    
</body>
</html>