<!--
    LA LISTE DES MATIERES : AJOUTER - SUPPRIMER - MODIFIER
    - - examen(code_exam,desg_exam,pôle)
    - seance_exam(code_sexam,desg_sexam, date , heure_debut, heure_fin, #code_mat,#code_examen)


 -->


 <?php
    require 'db_gestion_examen.php';
    session_start();
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

        $exam_select = $_GET['code_exam'];
        $sql_examens = $pdo->prepare('SELECT * FROM examen WHERE code_exam=?');
        $sql_examens->execute([$exam_select]);
        $exam=$sql_examens->fetch(PDO::FETCH_ASSOC);

        if(isset($_POST['ajouter'])){

            $desg_sexam = $_POST['desg_sexam'];
            $date = $_POST['date'];
            $heure_debut = $_POST['heure_debut'];
            $heure_fin = $_POST['heure_fin'];
            $code_mat = $_POST['code_mat'];


            if(!empty($exam_select) && !empty($desg_sexam) && !empty($date) && !empty($heure_debut) && !empty($heure_fin) && !empty($code_mat)){
                $sql_aj = $pdo->prepare('INSERT INTO seance_exam VALUES (NULL,?,?,?,?,?,?)');
                $sql_aj->execute([$desg_sexam,$date,$heure_debut,$heure_fin,$code_mat,$exam_select]);
            }
            header("location: new_exam.php");
        }

    ?>



<div class="container mt-4">

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1"> الإمتحان</span>
        <input type="text" class="form-control" value="<?php echo $exam['desg_exam']." ".$exam['pole']; ?>"  aria-label="Username" aria-describedby="basic-addon1" readonly>
    </div>


<form method="POST">

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">الحصة رقم</span>
            <input type="text" class="form-control" name="desg_sexam"  aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">اليوم</span>
            <input type="date" class="form-control" name="date"  aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">الفترة من</span>
            <input type="time" class="form-control" name="heure_debut"  aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">إلى</span>
            <input type="time" class="form-control" name="heure_fin" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="input-group mb-3">
            <?php $sql_mat = $pdo->query('SELECT * FROM matiere')->fetchAll(PDO::FETCH_ASSOC);?>
            <select name="code_mat" class="form-select" aria-label="Default select example">
                <option selected>اختر المادة</option>
                <?php foreach($sql_mat as $mat) { ?>
                <option value="<?php echo $mat['code_mat']; ?>"><?php echo $mat['desg_mat']; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="input-group mb-3">
            <button class="btn btn-primary" type="submit" name="ajouter">إضافة</button>
        </div>

</form>
</div>

</body>
</html>