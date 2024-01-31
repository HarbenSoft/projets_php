<?php 
    require('db_loc_immobiliere.php');
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lister tous les clients</title>
</head>
<body>
    <pre>
        <h1>La liste de tous les clients  : </h1><br>
        <div><a href="ajouter_client.php">Ajouter un nouveau client</a></div>
    <?php
        $sql = $pdo->prepare('SELECT * FROM client');
        $sql->execute();
        $clients = $sql->fetchAll(PDO::FETCH_ASSOC);

        // VAR_DUMP : AFFICHER LE TYPE ET LE CONTENU DE LA VARIABLE - FETCH_ASSOC = TABLEAU - FETCH_OBJ
        //var_dump($sql->fetchAll(PDO::FETCH_ASSOC)); 
        //print_r($sql-> fetchAll(PDO::FETCH_ASSOC));
    ?>
    <table width="100%"  border = "1">
        <head>
            <tr>
                <th>id client</th>
                <th>cin</th>
                <th>nom</th>
                <th>prenom</th>
                <th>email</th>
                <th>password</th>
                <th>supprimer</th>
            </tr>
        </head>
        <?php
           foreach($clients as $client){ ?>
                <tr>
                    <td><?php echo $client['id_client'] ?></td>
                    <td><?php echo $client['cin'] ?></td>
                    <td><?php echo $client['nom']?></td>
                    <td><?php echo $client['prenom'] ?></td>
                    <td><?php echo $client['email'] ?></td>
                    <td><?php echo $client['password'] ?></td>
                    <td><a href="supprimer_client.php?id=<?php echo $client['id_client']?>" onclick = "return confirm('Voulez-vous vraiment supprimer le client !')">supprimer</a></td>
                </tr>
            <?php }  ?>
    </table>
</body>
</html>