<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        nom: <input type="text" name="name"><br>
        email : <input type="email" name="email"><br>
        <button type="submit" value="Envoyer">Envoyer</button>
    </form>
    <?php
        include 'conn.php';
        include 'header.php';
        if (isset($_POST['name']) && isset($_POST['email'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $contenu = $conn->prepare("INSERT INTO etudiant (nom, email) VALUES (?, ?)");
            $contenu->execute([$name, $email]);
            echo "New etudiant created";
            
        }
    ?>
</body>
</html>