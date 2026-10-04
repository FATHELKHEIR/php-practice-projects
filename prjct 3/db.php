<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

</head>
<body >
    <?php
    include 'conn.php';
    include 'header.php';
    $contenu = $conn -> query("SELECT * FROM etudiant");
    echo "<table>
    <tr>
        <th>id</th>
        <th>nom</th>
        <th>email</th>
        <th>action</th>
    </tr>";
    while ($row = $contenu->fetch()) {
        echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['nom'] . "</td>
            <td>" . $row['email'] . "</td>
            <td>
                <a href='edit.php?idEtud=" . $row['id'] . "' class='btn btn-warning'>Modifier</a>
                <a href='delete.php?idEtud=" . $row['id'] . "' class='btn btn-danger'>Supprimer</a>
            </td>
        </tr>";
    }
    echo "</table>";
    ?>


</body>
</html>
