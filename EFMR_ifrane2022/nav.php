<?php
        session_start();
        if(isset($_SESSION['assure'])){
            $nom_assure = $_SESSION['assure']['nom_ass'];
            $prenom_assure = $_SESSION['assure']['prenom_ass'];
        }
        else{
            $nom_assure = "";
            $prenom_assure = "";
        }
?>
<nav class="bg-dark">
    <ul class="nav justify-content-center  ">
        <li class="nav-item">
            <a class="nav-link active" href="index.php" aria-current="page">Index</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="connexion.php">Connexion</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="accueil.php">Accueil</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="aj_dossier.php">Ajouter un dossier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="miseajour_Dossier.php">Mise à jour d'un dossier</a>
        </li>
        <li class="nav-item">
            <a class="nav-link " href="accueil.php"><?php echo $nom_assure." ". $prenom_assure ?></a>
        </li>
    </ul>
</nav>


<div
    class="table-responsive-sm"
>
    <table
        class="table table-striped-columns table-hover table-borderless table-primary align-middle"
    >
        <thead class="table-light">
            <caption>
                Table Name
            </caption>
            <tr>
                <th>Column 1</th>
                <th>Column 2</th>
                <th>Column 3</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            <tr
                class="table-primary"
            >
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
            <tr
                class="table-primary"
            >
                <td scope="row">Item</td>
                <td>Item</td>
                <td>Item</td>
            </tr>
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
