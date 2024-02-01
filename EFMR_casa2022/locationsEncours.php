<?php
    require 'db_loc_immobiliere.php';
    session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les locations en cours</title>
</head>
<body>
    <?php
        
        echo "<h1> Hi, ".$_SESSION['user']['nom']." " .$_SESSION['user']['prenom']."</h1><br>";
        $date_auj = date('Y-m-d');
        echo "Date d'aujourd'hui ". $date_auj;
        echo "<h2>La liste vos locations en cours sont :</h2><br>";
        $id_client = $_SESSION['user']['id_client'];
        $sql = $pdo->prepare('SELECT * FROM location l
                            INNER JOIN client c ON l.id_client = c.id_client
                            INNER JOIN immobilier i ON l.id_immobilier = i.id_immobilier
                            WHERE l.id_client = ? AND ? BETWEEN date_debut_location AND date_fin_location
                            ');
        $sql->execute([$id_client,$date_auj]);
        $locations = $sql->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($locations);
        echo "<a href='connexion.php' name='seDeconnecter'>Se déconnecter</a><br>";
    ?>
        <table width=100% border=1>
                <head>
                    <tr>
                        <th>Titre</th>
                        <th>Adresse</th>
                        <th>Prix</th>
                        <th>Date début location</th>
                        <th>Date fin location</th>
                    </tr>
                </head>
        <?php foreach($locations as $location){ ?>
            <tr>
                <td><?php echo $location['titre'] ?></td>
                <td><?php echo $location['adresse'] ?></td>
                <td><?php echo $location['prixlocation'] ?></td>
                <td><?php echo $location['date_debut_location'] ?></td>
                <td><?php echo $location['date_fin_location'] ?></td>
            </tr>
        <?php }?>
        </table>
    
</body>
</html>