<!--
    LA LISTE DES MATIERES : AJOUTER - SUPPRIMER - MODIFIER
    - Salle(num_salle, desg_salle)

 -->


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

        if(isset($_POST['ajouter'])){
                $desg = $_POST['desg_salle'];
                if(!empty($desg)){
                    $sql_aj = $pdo->prepare('INSERT INTO salle VALUES (NULL,?)');
                    $sql_aj->execute([$desg]);
                }else{
                    $message = "عليك إدخال القاعة أولا ";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }

        }
    ?>

<div class="container mt-2">
    <h2>لائحة القاعات</h2>
    <form  method="POST">
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="إضافة قاعة جديدة" name="desg_salle">
            <button class="btn btn-primary" type="submit" name="ajouter">إضافة</button>
        </div>
    </form>

  <table class="table">
    <thead class="table-success">
      <tr>
        <th>القاعات </th>
        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php $sql_salles = $pdo->query('SELECT * FROM salle')->fetchAll(PDO::FETCH_ASSOC);?>
        <?php foreach($sql_salles as $salle) { ?>
        <tr>
            <td> <?= $salle['desg_salle'] ?> </td>
            <td><a href="supprimer_salle.php?num_salle=<?php echo $salle['num_salle']?>" onclick = "return confirm('هل تريد فعلا حدف القاعة ؟')">X</a>
</td>

        </tr>
        <?php } ?>
    </tbody>

  </table>
</div>
</body>
</html>