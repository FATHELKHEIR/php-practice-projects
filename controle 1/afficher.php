<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $file = fopen("listeLivre", "r");
    echo '<table border="1">   
    <tr>
       <th>code</th>
       <th>titre</th>
       <th>categorie</th>
       <th>prix unitaire</th>
       <th> total </th>
    </tr> ';
        $file = fopen("listeLivre.txt", "r");
        while ($line = fgets($file)) {
            $contenu = explode("-", $line);
            echo '<tr>
            <td>'.$contenu[0].'</td>
            <td>'.$contenu[1].'</td>
            <td>'.$contenu[2].'</td>
            <td>'.$contenu[3].'</td>
            <td>'.$contenu[4].'</td>
            </tr>';
        }
        echo '</table>';
        fclose($file);
    
    ?>
</body>
</html>


