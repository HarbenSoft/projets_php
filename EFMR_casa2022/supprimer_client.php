<?php 
    require 'db_loc_immobiliere.php'; // include si le fichier n'est pas requis et le script continuera a s'exécuter
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer client </title>
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] = "GET"){
        $id_cli = htmlspecialchars($_REQUEST['id']);
    }

    $sql = $pdo->prepare('DELETE  FROM client WHERE id_client = ?');
    $sql->execute([$id_cli]);
    header('location: listerC.php');
    ?>
</body>
</html>