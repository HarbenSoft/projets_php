<?php
    require 'db_loc_immobiliere.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <?php

        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if (isset($_POST['connecter'])){
                $email = $_REQUEST['email'];
                $password= $_REQUEST['password'];
                if(!empty($email) && !empty('&password')){
                    $sql = $pdo->prepare('SELECT * FROM client WHERE email= ? AND password = ?');
                    $sql->execute([$email, $password]);
                    if ($sql->rowCount()>=1){
                        $_SESSION['user'] = $sql->fetch(PDO::FETCH_ASSOC);  
                        header('location: locationsEncours.php');
                    }else{
                        echo "email ou mot de passe incorrect !";
                    }
                }else{
                    echo "veuillez remplir les champs SVT ! ";
                }
            }
        }

    ?>
    <div><h1>Authentification : </h1></div>
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="">E-mail : </label>
        <input type="email" name="email" id=""><br><br>
        <label for="">Mot de passe : </label>
        <input type="password" name="password" id=""><br><br>
        <input type="submit" name="connecter" value="Se connecter">
    </form>
</body>
</html>