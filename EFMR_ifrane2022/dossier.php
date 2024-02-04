<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if($_SERVER['REQUEST_METHOD']=="POST"){
            echo "bonjour";
            if(isset($_POST['Enregistrer'])){
                $numdossier = htmlspecialchars($_POST['numdossier']);
                echo "num-dossier : ".$numdossier;
                /***
                $numdossier = htmlspecialchars($_REQUEST['numdossier']);
                $datedepot = htmlspecialchars($_REQUEST['datedepot']);
                    $montant_remboursement = $_REQUEST['montant_remboursement'];
                    $date_traitement = $_REQUEST['date_traitement'];
                    $lien_malade = $_REQUEST['lien_malade'];
                    $matricule = $_SESSION['assure']['matricule'];
                    $num_maladie = $_REQUEST['num_maladie'];
                    $total_dossier = $_REQUEST['total_dossier'];

                    echo "bonjour";
                    echo "num-dossier : ".$numdossier;
                    //var_dump($numdossier,$datedepot,$montant_remboursement,$date_traitement,$lien_malade,$matricule, $num_maladie, $total_dossier);

                    //$sql = $pdo->prepare('');<?php echo $_SERVER['PHP_SELF']
                    //$sql->execute();*/
                }
            }
    ?>
</html>