Voici un modèle relationnel de la gestion de la surveillance des examens par les professeurs d'une école :

- Professeur(*matricule_prof, nom_prof, pren_prof, #code_mat)
- Matiere(*code_mat, desg_mat)
- seance_exam(code_sexam,desg_sexam,date , heure_debut, heure_fin, #code_mat,#code_examen)
- examen(code_exam,desg_exam,pôle)
- Salle(num_salle, designation_salle)
- Surveiller(num_surv,#matricule_prof, #code_sexam, #num_salle)

1°) Créer la page acceuil qui permet d'afficher une liste pour :
    a. ajouter un nouveau examen, dont la matière est sélectionné dans une liste déroulante
    b.

2°) prévoir un menu déroulant présent dans toutes les pages pour accéder aux fonctionnalités demandées.






DB :

<?php
    require 'db_gestion_examen.php';
?>
<?php ?>

BOOTSTRAP & JS :

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


placeholder="إضافة مادة جديدة"
        <div class="input-group mb-3">

 action="<?php echo $_SERVER['PHP_SELF']; ?>"


 تاريخ إجراء امتحانات البكالوريا 2024 جميع المسالك والشعب الدورة العادية أيام 10 و11 و12 و13 يونيو 2024.


 تاريخ إجراء الدورة الإستدراكية من امتحانات البكالوريا أيام 8 و9 و10 و11 يوليوز 2024.



تاريخ إجراء الامتحان الجهوي اولى باك 2024 لجميع الشعب الدورة العادية أيام 5 و6 يونيو 2024.
 تاريخ إجراء الامتحان الجهوي اولى باك الدورة الإستدراكية للمترشحين الرسميين والاحرار أيام 3 و4 يوليوز 2024

 <?php $sql_examens = $pdo->query('SELECT * FROM examen')->fetchAll(PDO::FETCH_ASSOC);?>
            <select name="code_exam" id="">
                <option value="">اختر الامتحان</option>
                <?php foreach($sql_examens as $examen) { ?>
                <option value="<?php echo $examen['code_exam']; ?>"><?php echo $examen['desg_exam']." ".$examen['pole'] ; ?></option>
                <?php } ?>
            </select>


 <?php $sql_mat = $pdo->query('SELECT * FROM matiere')->fetchAll(PDO::FETCH_ASSOC);?>
        <select name="code_mat" id="">
            <option value="">اختر المادة</option>
            <?php foreach($sql_mat as $mat) { ?>
            <option value="<?php echo $mat['code_mat']; ?>"><?php echo $mat['desg_mat']; ?></option>
            <?php } ?>
        </select>


                    <button class="btn btn-primary" type="submit" name="valider">تحديد</button>
