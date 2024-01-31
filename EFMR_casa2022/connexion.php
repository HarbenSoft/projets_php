<?php
    require 'db_loc_immobiliere.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>
<body>
    <div><h1>Se connecter : </h1></div>
    <form action="locationsEncours.php" method="POST">
        <label for="">E-mail : </label>
        <input type="email" name="email" id=""><br>
        <label for="">Mot de passe : </label>
        <input type="password" name="password" id="">
    </form>
</body>
</html>