<!--
    LA LISTE DES MATIERES : AJOUTER - SUPPRIMER - MODIFIER
    - examen(code_exam,desg_exam,pôle)


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
                $desg = $_POST['desg_exam'];
                $pole = $_POST['pole'];

                if(!empty($desg)){
                    $sql_aj = $pdo->prepare('INSERT INTO examen VALUES (NULL,?,?)');
                    $sql_aj->execute([$desg,$pole]);
                }else{
                    $message = "عليك إدخال المعلومات كاملة أولا ";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }

        }
    ?>

<div class="container mt-2">
    <h2>لائحة الإمتحانات</h2>
    <form  method="POST">
        <div class="input-group mb-5">
            <input type="text" class="form-control" placeholder=" إمتحان " name="desg_exam">
            <input type="text" class="form-control" placeholder=" قطب " name="pole">
            <button class="btn btn-primary" type="submit" name="ajouter">إضافة</button>
        </div>
    </form>

  <table class="table">
    <thead class="table-success">
      <tr>
        <th>إمتحان </th>
        <th>القطب </th>
        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php $sql_examens = $pdo->query('SELECT * FROM examen')->fetchAll(PDO::FETCH_ASSOC);?>
        <?php foreach($sql_examens as $examen) { ?>
        <tr>
            <td> <?= $examen['desg_exam'] ?> </td>
            <td> <?= $examen['pole'] ?> </td>
            <td><a href="supprimer_exam.php?code_exam=<?php echo $examen['code_exam']?>" onclick = "return confirm('هل تريد فعلا حدف الامتحان ؟')">X</a>
</td>

        </tr>
        <?php } ?>
    </tbody>

  </table>
</div>
</body>
</html>