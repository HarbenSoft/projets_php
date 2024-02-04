<?php
        require 'db_compagnie_ass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Authentification</title>
</head>
<body>

    <?php
        include_once 'nav.php';

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_REQUEST['connecter'])){
                $matricule = $_REQUEST['matricule'];
                $password = $_REQUEST['password'];
                $sql=$pdo->prepare('SELECT * FROM assure WHERE
                        matricule = ? AND mot_depasse = ? ');
                $sql->execute([$matricule,$password]);
                if ($sql->rowCount()>=1){
                    $_SESSION['assure']=$sql->fetch();
                    header('location: accueil.php');
                }else
                echo "Matricule ou mot de passe incorrect ! ";
            }
        }
    ?>

    <h1>Se connecter</h1>
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
        <label for="">Matricule : </label>
        <input type="text" name="matricule" id=""><br>
        <label for="">Mot de passe : </label>
        <input type="password" name="password" id=""><br>
        <input type="submit" name="connecter" value="Se connecter"><br>
    </form>



</body>
</html>