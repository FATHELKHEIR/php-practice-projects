<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ajouter.php" method="POST">
        Nom:<input type="text" name="nom"><br><br>
        Login:<input type="text" name="login"><br><br>
        password:<input type="password" name="pswrd"><br><br>
        <select name="role">
            <option value="">Chose an option</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
        </select><br><br>
        <button type="submit" name="btn">Ajouter</button>
    </form>
    <?php
    if(isset($_POST['btn'])) {
        $nom=$_POST['nom'];
        $login=$_POST['login'];
        $pswrd=$_POST['pswrd'];
        $role=$_POST['role'];
        $file = fopen("users.txt", "r");
        $trouve=false;
        while($line=fgets($file)) {
            $h = explode(":",$line);
            if($h[1]==$login) {
                $trouve = true;
                echo'the user already exist';
                break;
            }
        }
        if($trouve == false) {
            $file=fopen('users.txt','a');
            $new = "$nom:$login:$pswrd:$role:\n";
            fwrite($file,$new);
            fclose($file);
            echo'User added successfuly';

        }

    }
    ?>
</body>
</html>