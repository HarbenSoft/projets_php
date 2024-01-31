<?php
    require 'db_loc_immobiliere.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un nouveau client</title>
</head>
<body>
    <?php
    if (isset($_POST['ajouter'])){
        $cin = $_POST['cin'];$nom = $_POST['nom'];$prenom = $_POST['prenom'];$email = $_POST['email'];$password = $_POST['password'];
        if(!empty($cin) && !empty($nom) && !empty($prenom) && !empty($email) && !empty($password)){
            $sql = $pdo->prepare('INSERT INTO client VALUES (null,?,?,?,?,?)');
            $sql->execute([$cin,$nom,$prenom,$email,$password]);
            header('location: listerC.php');
        } else{
            echo 'tous les champs sont requis !';
        }
    }
    ?>
    <pre>
    <form method="post">
        <label for="">CIN : </label><input type="text" name="cin" id=""><br>
        <label for="">NOM : </label><input type="text" name="nom" id=""><br>
        <label for="">PRENOM : </label><input type="text" name="prenom" id=""><br>
        <label for="">E-MAIL : </label><input type="email" name="email" id=""><br>
        <label for="">PASSWORD : </label><input type="password" name="password" id=""><br>
        <input type="submit" value="Ajouter" name="ajouter">
    </form>
    </pre>
</body>
</html>