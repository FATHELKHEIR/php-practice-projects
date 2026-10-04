<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form{
            padding: 60px;
            margin: 20px;
            border: 2px solid grey;
            border-radius: 15px;
            text-align:center ;
            width: 200px;
        }
    </style>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        login : <input type="text" name="login"><br>
        password : <input type="password" name="password"><br>
        <button type="submit" name="btn">connexion</button>
    </form>
    <?php
        if (isset($_POST['btn'])){
            $login = $_POST['login'];
            $password = $_POST['password'];

            $users = [];

             
                $file = fopen("users.txt", "r");

                while (($line = fgets($file)) ) {
                    $users = explode(":", $line);
                }
                fclose($file);
            


            foreach ($users as $user) {
                if ($user[1] == $login && $user[2] == $password){
                   

                    if ( $user[3] == "admin") {
                        header("Location: pageAdmin.php");
                    } else {
                        header("Location: pageUser.php");
                    }
                    
                }if ($user[1] == $login && $user[2] != $password){
                    echo '<p style="color:red;">le mot de pass est incorrect</p>';
                    break;
                }
                if ($user[1] != $login && $user[2] == $password)
                    echo "login est incorrect";
                }
            }

        
        
    ?>
    
</body>
</html>