<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <title>Accueil</title>
</head>
<body>
    <?php
        include_once 'nav_bar.php';

// Créez un formulaire avec un élément select
echo "<form method=\"post\">";
echo "<select name=\"choix1\">";
echo    "<option>toto</option>";
echo    "<option" . ($_POST['choix1'] == "titi" ? ' selected="selected"' : "") . ">titi</option>";
echo    "<option>tutu</option>";
echo "</select>";
echo "<p>";
echo "<input name=\"submit\" type=\"submit\" value=\"OK\" />";
echo "</form>";
?>
</body>
</html>