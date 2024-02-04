<?php
        require 'db_compagnie_ass.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Accueil</title>
</head>
<body>

    <?php

        include_once "nav.php";
        if(isset($_SESSION["assure"])){ ?>
            <form action="" method="POST">
                <input type="submit" value="déconnecter" name="deconnecter">
            </form>
            <?php  affiche_assure();

        }else{
            echo "Veuillez-vous s'authentifier avant de continuer ! ";
            echo "<a href='connexion.php'>Se connecter</a>";
        }

        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            if(isset($_REQUEST['deconnecter'])){
                if(isset($_SESSION["assure"])){
                    unset($_SESSION["assure"]);
                    session_destroy();
                }
                header('location: connexion.php');
            }
        }
    ?>


    <?php
        function affiche_assure(){
            /*utilisation de query */
            require 'db_compagnie_ass.php';
            $matricule = $_SESSION['assure']['matricule'];
            $assure=$pdo->query("SELECT * FROM assure A
                            INNER JOIN entreprise E ON A.num_entreprise = E.num_entreprise
                            WHERE A.matricule = $matricule")->fetch(PDO::FETCH_ASSOC);;


            echo "<h2> Les informations de l'assuré : </h2>";
            echo "<h2> Matricule : " . $assure['matricule'] . "</h2>";
            echo "<h2> Nom : " . $assure['nom_ass'] . "</h2>";
            echo "<h2> Prénom : " . $assure['prenom_ass'] . "</h2>";
            echo "<h2> Date de naissance : " . $assure['date_naissance'] . "</h2>";
            echo "<h2> Nombre d'enfant : " . $assure['nb_enfant'] . "</h2>";
            echo "<h2> Situation familiale : " . $assure['situation_familiale'] . "</h2>";
            echo "<h2> Total remboursement : " . $assure['total_remb'] . "</h2>";
            echo "<h2> Date déces : " . $assure['date_deces'] . "</h2><br>";

            echo "<h2> Embauché(e) par l'entreprise : </h2>";
            echo "<h2> num d'entreprise : " . $assure['num_entreprise'] . "</h2>";
            echo "<h2> nom d'entreprise : " . $assure['nom_entreprise'] . "</h2>";
            echo "<h2> adresse : " . $assure['adresse'] . "</h2>";
            echo "<h2> telephone : " . $assure['telephone'] . "</h2>";
            echo "<h2> nombre_d'employé : " . $assure['nombre_employes'] . "</h2>";
            echo "<h2> E-mail : " . $assure['email'] . "</h2>";
        }
    ?>
</body>
</html>