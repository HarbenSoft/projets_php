<?php
    require 'db_gestion_examen.php';
?>

<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Les matières</title>
</head>

<body>

    <?php
        include_once 'nav_bar.php';

        if(isset($_GET['matr_prof'])){
            $matr_prof = htmlspecialchars($_GET['matr_prof']);
            if(!empty($matr_prof)){
                $sql_sup = $pdo->prepare('DELETE FROM professeur WHERE matricule_prof=?');
                $sql_sup->execute([$matr_prof]);
                header("location: professeurs.php");
            }
        }

?>
</body>
</html>