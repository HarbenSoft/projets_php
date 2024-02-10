<!--
    LA LISTE DES PROFESSEURS : AJOUTER - SUPPRIMER - MODIFIER
    - Professeur(*matricule_prof, nom_prof, pren_prof, #code_mat)
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
                $nom_prof = $_POST['nom_prof'];
                $pren_prof = $_POST['pren_prof'];
                $code_mat = $_POST['code_mat'];

                if(!empty($nom_prof) && !empty($pren_prof) && !empty($code_mat)){
                    $sql_aj = $pdo->prepare('INSERT INTO professeur VALUES (NULL,?,?,?)');
                    $sql_aj->execute([$nom_prof,$pren_prof,$code_mat]);
                }else{
                    $message = "عليك إدخال اسم المعلومات كاملة أولا ";
                    echo "<script type='text/javascript'>alert('$message');</script>";
                }
        }
    ?>

<div class="container mt-2">
    <h2>لائحة الأساتدة</h2>
    <form  method="POST">
        <div class="input-group mb-5">

            <input type="text" class="form-control" placeholder="اسم الاستاد" name="nom_prof">
            <input type="text" class="form-control" placeholder="لقب الاستاد" name="pren_prof">

        <?php $sql_mat = $pdo->query('SELECT * FROM matiere')->fetchAll(PDO::FETCH_ASSOC);?>
        <select name="code_mat" id="">
            <option value="">اختر المادة</option>
            <?php foreach($sql_mat as $mat) { ?>
            <option value="<?php echo $mat['code_mat']; ?>"><?php echo $mat['desg_mat']; ?></option>
            <?php } ?>
        </select>
            <button class="btn btn-primary" type="submit" name="ajouter">إضافة</button>
        </div>
    </form>

  <table class="table">
    <thead class="table-success">
      <tr>
        <th>اسم الأستاد</th>
        <th>لقب الأستاد</th>
        <th> المادة المدرسة</th>
        <th>حذف </th>
     </tr>

    </thead>
    <tbody>
        <?php $sql_professeurs = $pdo->query('SELECT * FROM professeur')->fetchAll(PDO::FETCH_ASSOC);?>
        <?php foreach($sql_professeurs as $prof) { ?>
        <tr>
            <td> <?= $prof['nom_prof'] ?> </td>
            <td> <?= $prof['pren_prof'] ?> </td>

        <?php
            $sql_desg_mat = $pdo->prepare('SELECT desg_mat FROM matiere WHERE code_mat=?');
            $sql_desg_mat->execute([$prof['code_mat']]);
            $desg_mat = $sql_desg_mat->fetchColumn();
        ?>
            <td> <?= $desg_mat ?> </td>

            <td><a href="supprimer_prof.php?matr_prof=<?php echo $prof['matricule_prof']?>" onclick = "return confirm('هل تريد فعلا حدف الأستاد ؟')">X</a>
</td>

        </tr>
        <?php } ?>
    </tbody>

  </table>
</div>
</body>
</html>