<?php
    require 'db_loc_immobiliere.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La liste des locations : </title>
</head>
<body>
    <?php
        if(isset($_GET['rechercher'])){
            $date1 = $_GET['date1'];
            $date2 = $_GET['date2'];
            $sql = $pdo->prepare('SELECT * FROM location loc
                                INNER JOIN immobilier im ON loc.id_immobilier = im.id_immobilier
                                INNER JOIN client c ON loc.id_client = c.id_client
                                WHERE date_debut_location >= ? AND date_fin_location <= ?');
        $sql->execute([$date1,$date2]);
        $locations = $sql->fetchAll(PDO::FETCH_ASSOC);
        }
    ?>
    <pre>
        <div><h1>Rechercher les locations entre les dates : </h1> </div>
        <form action="" method="GET">
            <label for="">date 1 : </label>
            <input type="date" name="date1" id="" value="<?php echo $date1; ?>"><br>
            <label for="">date 2 : </label>
            <input type="date" name="date2" id="" value="<?php echo $date2; ?>"><br>
            <input type="submit" value="Rechercher" name="rechercher"><br>
        </form>
        <table width="100%" border = 1>
            <header>
                <tr>
                    <th>Titre de location</th>
                    <th>Adresse de location</th>
                    <th>Nom client</th>
                    <th>Prénom de client</th>
                    <th>date début de location</th>
                    <th>date fin de location</th>
                </tr>
            </header>
            <?php foreach($locations as $loc) { ?>
                <tr>
                    <td><?php echo $loc['titre'] ?></td>
                    <td><?php echo $loc['adresse'] ?></td>
                    <td><?php echo $loc['nom'] ?></td>
                    <td><?php echo $loc['prenom'] ?></td>
                    <td><?php echo $loc['date_debut_location'] ?></td>
                    <td><?php echo $loc['date_fin_location']  ?></td>
                </tr>
            <?php } ?>
        </table>
    </pre>
</body>
</html>