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
    <title>Modifier un dossier</title>
</head>
<body>
    <?php
include_once "nav.php";

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['modifier'])){

        $num_dossier = $_GET['num_dos'];
        $datedepot = $_POST['datedepot'];
        $montant_remboursement = $_POST['montant_remboursement'];
        $date_traitement = $_POST['date_traitement'];
        $lien_malade = $_POST['lien_malade'];
        $num_maladie = $_POST['num_maladie'];
        $total_dossier = $_POST['total_dossier'];

        if(!empty($datedepot) &&!empty($montant_remboursement)&&!empty($date_traitement) &&!empty($lien_malade) &&!empty($num_maladie)&&!empty($total_dossier)){
            $sql2 = $pdo->prepare('UPDATE dossier SET datedepot= ?, montant_remboursement=?, date_traitement=?, lien_malade=?, num_maladie =?, total_dossier=?
                WHERE numdossier=?');
            $sql2->execute([$datedepot,$montant_remboursement,$date_traitement,$lien_malade,$num_maladie, $total_dossier,$num_dossier]);

            header("location: miseajour_dossier.php");
        }
    }
}

if(!isset($_SESSION["assure"])){
    echo "Veuillez-vous s'authentifier avant de continuer ! ";
    echo "<a href='connexion.php'>Se connecter</a>";
}else{
    if($_SERVER['REQUEST_METHOD']=="GET"){
        $num_dossier = $_GET['num_dos'];
        $sql = $pdo->prepare('SELECT * FROM dossier WHERE numdossier = ?');
        $sql->execute([$num_dossier]);
        if($sql->rowCount()>=1){
             $dossier= $sql->fetch(PDO::FETCH_ASSOC);

    ?>

<form method="POST">

    <label for="" class="form-label">Numéro de dossier : </label>
    <input type="text" name="numdossier" id=""  class="form-control"  aria-describedby="helpId" value="<?php echo $num_dossier ; ?>" readonly/>

    <label for="" class="form-label">Date de dépot de dossier : </label>
    <input type="date" name="datedepot" id=""  class="form-control" aria-describedby="helpId" value="<?php echo $dossier['datedepot']; ?>"/>

    <label for="" class="form-label">Montant de remboursement : </label>
    <input type="text" name="montant_remboursement" id=""  class="form-control"  aria-describedby="helpId" value="<?php echo $dossier['montant_remboursement']; ?>"/>

    <label for="" class="form-label">Date de traitement de dossier : </label>
    <input type="date" name="date_traitement" id=""  class="form-control"  aria-describedby="helpId" value="<?php echo $dossier['date_traitement']; ?>"/>

    <label for="" class="form-label">Lien malade : </label>
    <input type="text" name="lien_malade" id=""  class="form-control"  aria-describedby="helpId" value="<?php echo $dossier['lien_malade']; ?>"/>

    <label for="" class="form-label">Maladie </label>
    <select name="num_maladie" id="">
        <?php
            $maladies=$pdo->query('SELECT * FROM maladie')->fetchAll(PDO::FETCH_ASSOC);
            ?>
        <?php foreach($maladies as $maladie){
            $selected = $maladie['num_maladie'] == $dossier['num_maladie'] ? 'selected':'';?>

        <option <?php echo $selected ?> value="<?php echo $maladie['num_maladie']; ?>"><?php echo $maladie['designation_maladie']; ?></option>
        <?php } ?>
    </select><br>

    <label for="" class="form-label">total de dossier : </label>
    <input type="text" name="total_dossier" id=""  class="form-control" placeholder="" aria-describedby="helpId" value="<?php echo $dossier['total_dossier']; ?>"/>

    <input type="submit" value="Modifier" name="modifier">

</form>
<?php    }
    } }?>

</body>
</html>