<!--  tables  :
Dossier(*numdossier, datedepot, montant_remboursement, date_traitement,
        lien_malade, #matricule, #num_maladie, total_dossier)
Maladie(*num_maladie,designation_maladie)

-->

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
        $assure_connecter = $_SESSION['assure']['matricule'];
        $sql = $pdo->prepare('SELECT * FROM dossier D
                                    INNER JOIN assure A ON D.matricule = A.matricule
                                    WHERE D.matricule = ?');
        $sql->execute([$assure_connecter]);
        $dossiers  = $sql->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($dossiers);
    ?>
    <div
        class="table-responsive-md" >
        <table class="table table-striped-columns table-hover table-borderless table-primary align-middle">
            <thead class="table-light">
                <caption> La liste des dossiers de : <?php echo $_SESSION['assure']['nom_ass']." ".$_SESSION['assure']['prenom_ass'] ; ?></caption>
                <tr>
                    <th>Numéro</th>
                    <th>Date dépôt</th>
                    <th>Montant de remboursement</th>
                    <th>date de traitement</th>
                    <th>lien malade</th>
                    <th>maladie</th>
                    <th>total de dossier</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <?php foreach($dossiers as $dossier) { ?>
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
                        <td>
                            <a href="supprimer_dossier.php?num_dos=<?php echo $dossier['numdossier'];?>" onclick = "return confirm('Voulez-vous supprimer le dossier !')" name="supprimer">Supprimer</a>
                            <a href="modifier_dossier.php?num_dos=<?php echo $dossier['numdossier'];?>" name="modifier">Modifier</a>
                            <a href="selectionner_dossier.php?num_dos=<?php echo $dossier['numdossier'];?>" name="selectionner">Sélectionner</a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <?php } ?>
</body>
</html>