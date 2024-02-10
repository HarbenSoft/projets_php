<!--
    LA LISTE DES MATIERES : AJOUTER - SUPPRIMER - MODIFIER
    - - examen(code_exam,desg_exam,pôle)
    - seance_exam(code_sexam,desg_sexam, date , heure_debut, heure_fin, #code_mat,#code_examen)


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
        if(isset($_POST['confirm_exam'])){
            $exam_select = $_POST['code_exam'];
        }else {
            $exam_select="";
        }
    ?>

<div class="container mt-2">
    <h2>حصص الامتحان</h2><br>

    <form method="POST">
        <div class="container px-4">
            <div class="row gx-5">
                <div class="col">
                    <div class="p-3 border bg-light">
                        <select name="code_exam" class="form-select" id="inputGroupSelect04" aria-label="Example select with button addon">
                            <option selected>اختر الامتحان</option>
                            <?php
                                $sql_examens = $pdo->query('SELECT * FROM examen')->fetchAll(PDO::FETCH_ASSOC);
                                    foreach($sql_examens as $examen) {
                                     $selected = ($_POST['code_exam'] == $examen['code_exam']) ?  "selected" : ""; ?>
                            <option  <?php echo $selected ?> value="<?php echo $examen['code_exam']; ?>"><?php echo $examen['desg_exam']." ".$examen['pole'] ; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="p-3 border bg-light">
                        <button name="confirm_exam" class="btn btn-primary" type="submit">تأكيد</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <div>
        <a href="add_seance_exam.php?code_exam=<?php echo $exam_select; ?>" name="ajout_seance" class="btn btn-primary" type="submit"> إضافة حصة</a>
    </div>

  <table class="table">
    <thead class="table-success">
      <tr>
        <th>الحصة </th>
        <th>اليوم </th>
        <th>الفترة من  </th>
        <th>إلى </th>
        <th> المادة </th>
        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php
            $sql_s_examen = $pdo->prepare('SELECT * FROM seance_exam WHERE code_examen=?');
            $sql_s_examen->execute([$exam_select]);
            $seances=$sql_s_examen->fetchAll(PDO::FETCH_ASSOC);?>

        <?php foreach($seances as $seance) { ?>
        <tr>
            <td> <?= $seance['desg_sexam'] ?> </td>
            <td> <?= $seance['date'] ?> </td>
            <td> <?= $seance['heure_debut'] ?> </td>
            <td> <?= $seance['heure_fin'] ?> </td>

            <?php
                $sql_mat = $pdo->prepare('SELECT desg_mat FROM matiere WHERE code_mat= ?');
                $sql_mat->execute([$seance['code_mat']]);
                $matiere = $sql_mat->fetchColumn();
                ?>
            <td> <?= $matiere ?> </td>
            <td><a href="supprimer_seance.php?code_sexam=<?php echo $seance['code_sexam']?>" onclick = "return confirm('هل تريد فعلا حدف الحصة ؟')">X</a></td>
        </tr>

        <?php } ?>
    </tbody>

  </table>
</div>

</body>
</html>