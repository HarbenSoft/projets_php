<?php
        require 'db_compagnie_ass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap css only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>EVALUATION REGIONAL IFRANE 2022</title>
</head>
<body>

    <?php
        include_once 'nav.php';
        if(!isset($_SESSION['assure'])){
            echo "Veuillez-vous s'authentifier avant de continuer !  ";
            echo "<a href='connexion.php'>Se connecter</a>";
        }

        if($_SERVER['REQUEST_METHOD']=="GET"){
            $num_dossier = htmlspecialchars($_GET['num_dos']);
            $sql = $pdo->prepare('DELETE FROM dossier WHERE numdossier = ?');
            $sql->execute([$num_dossier]);
            header('location: miseajour_Dossier.php');
    }
    ?>
</body>
</html>