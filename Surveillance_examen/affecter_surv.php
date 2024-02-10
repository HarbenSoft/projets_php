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
        global $gard,$remp,$perm;
        $gard=$remp=$perm=0;

        function test_genre($x){
            if ($x=="احتياط"){
                $remp++;
            }elseif($x=="مداوم"){
                $perm++;
            }else{
                $gard++;
            }
        }

    ?>


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


<div class="table-responsive">
  <table class="table">
    <thead class="table-success">
      <tr>
        <th>الاستاد </th>
        <th>المادة  </th>
        <th>الحصة 1 - مراقب 1 </th>
        <th> الحصة 1 - مراقب 2  </th>
        <th>الحصة 2 - مراقب 1 </th>
        <th> الحصة 2 - مراقب 2  </th>
        <th>الحصة 3 - مراقب 1 </th>
        <th> الحصة 3 - مراقب 2  </th>
        <th>حراسة  </th>
        <th>احتياط  </th>
        <th>مداوم  </th>

        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php $sql_prof = $pdo->query('SELECT * FROM professeur')->fetchAll(PDO::FETCH_ASSOC); ?>
        <?php $sql_salles = $pdo->query('SELECT * FROM salle')->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <?php foreach($sql_prof as $prof) { ?>
        <tr>
            <td> <?= $prof['nom_prof']." ".$prof['pren_prof'] ?> </td>

        <?php  $sql_mat = $pdo->prepare('SELECT desg_mat FROM matiere WHERE code_mat= ?');
                $sql_mat->execute([$prof['code_mat']]);
                $matiere = $sql_mat->fetchColumn();
                ?>
            <td> <?= $matiere ?> </td>

            <td><select name="sal_s1_p1" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select></td>

            <td> <select name="sal_s1_p2" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option ><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select> </td>

            <td> <select name="sal_s2_p1" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select> </td>

            <td> <select name="sal_s2_p2" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select> </td>

            <td> <select name="sal_s3_p1" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select> </td>

            <td> <select name="sal_s3_p2" class="form-select" aria-label="Default select example">
                <?php foreach($sql_salles as $salle) { ?>
                <option><?php echo $salle['desg_salle'] ?></option>
                <?php test_genre($salle['desg_salle']); } ?>
            </select> </td>

              <td> <?php echo $gard; ?> </td>
              <td><?php echo $remp; ?></td>
              <td><?php echo $perm; ?></td>

            <td><a href="#" onclick = "return confirm('هل تريد فعلا حدف الحصة ؟')">X</a></td>

        </tr>
        <?php } ?>

    </tbody>

  </table>
  </div>

</body>
</html>