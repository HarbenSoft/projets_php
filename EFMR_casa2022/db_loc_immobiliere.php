<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Base de données loc_immobliere</title>
</head>
<body>
    <?php
        try{
            $pdo = new PDO("mysql:host=localhost; dbname=loc_immobiliere","root","");
        }catch(PDOException $e){
            echo "impossible de se connecter à la base de données ! ". $e.getMessage();
        }
    ?>
</body>
</html>