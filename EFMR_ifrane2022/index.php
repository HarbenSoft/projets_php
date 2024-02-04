<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--  bootstrap css only -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>EVALUATION REGIONAL IFRANE 2022</title>
</head>
<body>
    
    <?php
        include_once 'nav.php';
        session_start();
        if(!isset($_SESSION['assure'])){
            header("location: connexion.php");
        }
    ?>
</body>
</html>