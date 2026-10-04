

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Users</title>
</head>
<body>

<table border="1">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Login</th>
            <th>Mot de passe</th>
            <th>Role</th>
        </tr>
    </thead>

    <tbody>
        <?php
        $users = [];

        $file = fopen("users.txt", "r");

        if ($file) {
           while (($line = fgets($file)) ) {
           $users[] = explode(":", $line);
          }
        fclose($file);
       }
        foreach ($users as $user) { ?>
        <tr>
            <td><?php echo $user[0]; ?></td>
            <td><?php echo $user[1]; ?></td>
            <td><?php echo $user[2]; ?></td>
            <td><?php echo $user[3]; ?></td>
        </tr>
        <?php } ?>
    </tbody>
    
    
</table>

</body>
</html>