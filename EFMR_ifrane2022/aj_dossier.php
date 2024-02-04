<!--  tables  : 
Dossier(*numdossier, datedepot, montant_remboursement, date_traitement,
        lien_malade, #matricule, #num_maladie, total_dossier)
Maladie(*num_maladie,designation_maladie)

-->
<?php
    require 'db_compagnie_ass.php';
    session_start();
    include_once 'nav.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajouter un dossier</title>
</head>
<body>
    <?php
        include_once 'nav.php';
        if(isset($_SESSION["assure"])){

            $maladies = $pdo->query('SELECT * FROM maladie')->fetchAll(PDO::FETCH_ASSOC); 
    ?>

            <form action="dossier.php" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Numéro de dossier : </label>
                    <input type="text" name="numdossier" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                    <div class="mb-3">
                    <label for="" class="form-label">Date de dépot de dossier : </label>
                    <input type="date" name="datedepot" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Montant de remboursement : </label>
                    <input type="text" name="montant_remboursement" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Date de traitement de dossier : </label>
                    <input type="date" name="date_traitement" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Lien malade : </label>
                    <input type="text" name="lien_malade" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">total de dossier : </label>
                    <input type="text" name="total_dossier" id=""  class="form-control" placeholder="" aria-describedby="helpId" />
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">La liste des maladie : </label>
                    <select name="" id="">
                        <?php foreach($maladies as $maladie){ ?>
                        <option name="num_maladie" value="<?php echo $maladie['num_maladie']; ?>"><?php echo $maladie['designation_maladie']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <input type="submit" value="Enregistrer">
                </div>
            </form>    


    <?php if($_SERVER['REQUEST_METHOD']=="POST"){
                if(isset($_POST['Enregistrer'])){
                    
                    $numdossier = htmlspecialchars($_REQUEST['numdossier']);
                    $datedepot = htmlspecialchars($_REQUEST['datedepot']);
                    $montant_remboursement = $_REQUEST['montant_remboursement'];
                    $date_traitement = $_REQUEST['date_traitement'];
                    $lien_malade = $_REQUEST['lien_malade'];
                    $matricule = $_SESSION['assure']['matricule'];
                    $num_maladie = $_REQUEST['num_maladie'];
                    $total_dossier = $_REQUEST['total_dossier'];
                    //var_dump($numdossier,$datedepot,$montant_remboursement,$date_traitement,$lien_malade,$matricule, $num_maladie, $total_dossier);
                    //$sql = $pdo->prepare('');<?php echo $_SERVER['PHP_SELF']
                    //$sql->execute();
                }
            }
    } else{
            echo "Veuillez-vous s'authentifier avant de continuer !";
            echo "<a href='connexion.php'>Se connecter</a>";
            header('location: connexion.php');
        }
    ?>          
    
</body>
</html>