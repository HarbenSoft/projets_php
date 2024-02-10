<!--
    LA LISTE DES MATIERES : AJOUTER - SUPPRIMER - MODIFIER
    - Matiere(*code_mat, desg_mat)
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
                $desg = $_POST['desg_mat'];
                if(!empty($desg)){
                    $sql_aj = $pdo->prepare('INSERT INTO matiere VALUES (NULL,?)');
                    $sql_aj->execute([$desg]);
                }else{
                    $message = "عليك إدخال اسم المادة أولا ";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }

        }
    ?>

<div class="container mt-2">
    <h2>لائحة المواد</h2>
    <form  method="POST">
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder="إضافة مادة جديدة" name="desg_mat">
            <button class="btn btn-primary" type="submit" name="ajouter">إضافة</button>
        </div>
    </form>

  <table class="table">
    <thead class="table-success">
      <tr>
        <th>المواد </th>
        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php $sql_matieres = $pdo->query('SELECT * FROM matiere')->fetchAll(PDO::FETCH_ASSOC);?>
        <?php foreach($sql_matieres as $matiere) { ?>
        <tr>
            <td> <?= $matiere['desg_mat'] ?> </td>
            <td><a href="supprimer_mat.php?code_mat=<?php echo $matiere['code_mat']?>" onclick = "return confirm('هل تريد فعلا حدف المادة ؟')">X</a>
</td>

        </tr>
        <?php } ?>
    </tbody>

  </table>
</div>
</body>
</html>