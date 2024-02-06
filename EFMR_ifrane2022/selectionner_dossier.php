<?php
        require 'db_compagnie_ass.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Mise à jour d'un dossier</title>
</head>
<body>
    <?php

    include_once "nav.php";

    if(!isset($_SESSION["assure"])){
        echo "Veuillez-vous s'authentifier avant de continuer ! ";
        echo "<a href='connexion.php'>Se connecter</a>";
    }else{
        if($_SERVER['REQUEST_METHOD']=="GET"){
            $num_dossier = $_GET['num_dos'];
            $sql_dossier = $pdo->prepare('SELECT * FROM dossier WHERE numdossier = ?');
            $sql_dossier->execute([$num_dossier]);
            if($sql_dossier->rowCount()>=1){
                 $dossier= $sql_dossier->fetch(PDO::FETCH_ASSOC);



            $sql_rubriques = $pdo->prepare('SELECT * FROM Rubrique R
                                    INNER JOIN Dossier D ON R.numdossier = D.numdossier
                                    WHERE D.numdossier = ?');
            $sql_rubriques->execute([$num_dossier]);
            $rubriques_dossier  = $sql_rubriques->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div
        class="table-responsive-md" >
        <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>Numéro</th>
                    <th>Date dépôt</th>
                    <th>Montant de remboursement</th>
                    <th>date de traitement</th>
                    <th>lien malade</th>
                    <th>maladie</th>
                    <th>total de dossier</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                    <tr class="table-primary" >
                        <td scope="row"> <?php echo $dossier['numdossier']; ?></td>
                        <td><?php echo $dossier['datedepot']; ?></td>
                        <td><?php echo $dossier['montant_remboursement']; ?></td>
                        <td><?php echo $dossier['date_traitement']; ?></td>
                        <td><?php echo $dossier['lien_malade']; ?></td>

                        <?php $sql = $pdo->prepare('SELECT designation_maladie FROM maladie
                                            WHERE num_maladie = ? ');
                            $sql->execute([$dossier['num_maladie']]);
                            $maladie_desg = $sql->fetchColumn(); ?>
                        <td><?php echo $maladie_desg; ?></td>
                        <td><?php echo $dossier['total_dossier']; ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <div
        class="table-responsive-md" >
        <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <tr>
                    <th>num rubrique</th>
                    <th>nom rubrique</th>
                    <th>montant rubrique</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
            <?php foreach($rubriques_dossier as $rubrique){ ?>
                    <tr class="table-primary" >
                        <td scope="row"> <?php echo $rubrique['num_rubrique']; ?></td>
                        <td><?php echo $rubrique['nom_rubrique']; ?></td>
                        <td><?php echo $rubrique['montant_rubrique']; ?></td>
                    </tr>
            <?php } } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</body>
</html>