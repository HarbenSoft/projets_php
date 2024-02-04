<?php
    require 'db_compagnie_ass.php';
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
        $numdossier = $datedepot = $montant_remboursement = $date_traitement = $lien_malade = $total_dossier = "";
        if(isset($_SESSION["assure"])){
            $maladies = $pdo->query('SELECT * FROM maladie')->fetchAll(PDO::FETCH_ASSOC);
            if($_SERVER['REQUEST_METHOD']=="POST"){
                $numdossier = $_POST['numdossier']; // numérique
                $datedepot = $_POST['datedepot']; //date
                $montant_remboursement = $_POST['montant_remboursement']; //décimal
                $date_traitement = $_POST['date_traitement']; //date
                $lien_malade = $_POST['lien_malade']; // varchar
                $matricule = $_SESSION['assure']['matricule']; // numérique
                $num_maladie = $_POST['num_maladie']; // numérique
                $total_dossier = $_POST['total_dossier']; // décimal
                if(!empty($numdossier) && !empty($datedepot) &&!empty($montant_remboursement) &&!empty($date_traitement)
                        &&!empty($lien_malade) &&!empty($matricule) &&!empty($num_maladie) &&!empty($total_dossier)){
                    if(ctype_digit($numdossier)){
                        $sql = $pdo->prepare('INSERT INTO dossier VALUE (?,?,?,?,?,?,?,?)');
                        $sql->execute([NULL,$datedepot,$montant_remboursement,$date_traitement,$lien_malade,
                        $matricule,$num_maladie,$total_dossier]);
                        alert_info();
                    }else{
                        alert_danger();        }
                }else{
                    alert_danger();
                }
            }?>
            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
            <label for="" class="form-label">Numéro de dossier : </label>
            <input type="text" name="numdossier" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $numdossier; ?>" />
            <label for="" class="form-label">Date de dépot de dossier : </label>
            <input type="date" name="datedepot" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $datedepot; ?>"/>
            <label for="" class="form-label">Montant de remboursement : </label>
            <input type="text" name="montant_remboursement" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $montant_remboursement; ?>"/>
            <label for="" class="form-label">Date de traitement de dossier : </label>
            <input type="date" name="date_traitement" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $date_traitement; ?>"/>
            <label for="" class="form-label">Lien malade : </label>
            <input type="text" name="lien_malade" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $lien_malade; ?>"/>
            <label for="" class="form-label">total de dossier : </label>
            <input type="text" name="total_dossier" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $total_dossier; ?>"/>
            <label for="" class="form-label">La liste des maladie : </label>
            <select name="num_maladie" id="">
                <?php foreach($maladies as $maladie){ ?>
                <option value="<?php echo $maladie['num_maladie']; ?>"><?php echo $maladie['designation_maladie']; ?></option>
                <?php } ?>
            </select><br>
            <input type="submit" value="Enregistrer" name="enregistrer">
            </form>
            <?php } else{
            echo "Veuillez-vous s'authentifier avant de continuer !  ";
            echo "<a href='connexion.php'>Se connecter</a>";
            }?>


    <?php function alert_danger(){ ?>
    <div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Problème d'enregistrement</h4>
    <p>champ manquant ou valeur non valide</p>
    <hr />
    <p class="mb-0">veuillez remplir tous les champs ! et le numéro de dossier doit être un entier !</p>
    </div>
    <?php }?>

    <?php function alert_info(){ ?>
    <div class="alert alert-info" role="alert" >
    <strong>le dossier est bien enregistré !</strong>
    <a href="aj_dossier.php" class="alert-link"> -> Ajouter un autre dossier </a>
    </div>
    <?php }?>

</body>
</html>