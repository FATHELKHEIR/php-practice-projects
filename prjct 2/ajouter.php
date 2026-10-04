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
        prenom : <input type="text" name="prenom"><br>
        age: <input type="number" name="age"><br>
        <button type="submit">Enregistrer</button>
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "basepersonne";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
            die("Could not connect. " . $e->getMessage());
        }
        if (isset($_POST['name']) && isset($_POST['prenom']) &&  isset($_POST['age'])){
            $name = $_POST['name'];
            $prenom = $_POST['prenom'];
            $age = $_POST['age'];

            $sql = "INSERT INTO personne (nom, prenom, age) VALUES (:name, :prenom, :age)";
            $stmt = $conn->prepare($sql);
            $stmt->execute(
                [
                    ':name' => $name,
                    ':prenom' => $prenom,
                    ':age' => $age,
                ]
                );

            echo "New record created successfully";
        }
    ?>
    

</body>
</html>