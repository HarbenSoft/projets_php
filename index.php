<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Les projets PHP : </title>
</head>
<body>
    <div><a href="efmr_casa2022/index.php">* Projet 1 : EFMR casa 2021/2022</a></div><br>
    <div><a href="efmr_casa2022/index.php">* Projet 2 : EFMR </a></div><br>

<?php
//Commentaire sur une seule ligne, style C++
/* 
Ceci est un
commentaire
sur
plusieurs lignes
*/
# Ceci est un commentaire style shell sur une seule ligne

?>

<?php
echo 'Ceci est un test' ."\n"; 
echo 'Ceci est un autre test';
?>
<?=     // <?php echo
'Et un test final'; 
?>

<?php
$var; //nom de variable valide
$Var; //nom de variable valide mais différent de précédent
#$4vars; //nom de variable invalide: commencer avec un nombre n’est pas autorisé
$_var; //nom de variable valide
$état; //nom de variable valide
#$éta+; //nom de variable invalide: les caractères spéciaux comme + ne sont pas autorisés
#$var Vat; //nom de variable invalide: l’espace n’est pas autorisé
?>

<?php
$x = 100;
$y = 200;
function test() {
    $var = "variable locale";
    GLOBAL $y;
    echo '<p> $var dans le contexte global : ' .$GLOBALS["var"] . '</p>';
    echo '<p> $x dans le contexte global : ' .$GLOBALS["x"] . '</p>';
    echo '<p> $y dans le contexte global : '."$y".'</p>';
    echo "<p> la somme de  x et y :" .$GLOBALS["x"]+ $GLOBALS["y"]. "</p>";
    echo '$var dans le contexte courant : ' . $var . "\r"; //
}
$var = "Exemple de contenu";
test();
?>

<?php
/* Une variable statique a une portée locale uniquement, 
mais elle ne perd pas sa valeur lorsque le script appelle la fonction.*/
function test2()
{
//la variable $i est intialisée unitquemet lors du premier appel à la function
static $i = 0;
echo $i;
// à chaque fois la function est appelée, elle affichera une valeur de $i + 1
$i++;
}

test2();
test2();
test2();

/* Une variable dynamique prend la valeur d'une variable et l'utilise comme nom d'une autre variable, 
en utilisant le "$$" précédent la variable.*/
$a = 'Bonjour' ;
$$a = 'étudiant' ;
Echo "$a {${$a}}" ; // Bonjour étudiant
Echo "$a $Bonjour" ; // Bonjour étudiant

// constante  n'est pas préfixée d'un $
const test = 'Bonjour les étudiants !\n';
echo test; //Affiche Bonjour les étudiants !

//affectation
$a = 2; //$a est maintenant égal à 2
echo $a;
$b = 3; //$b est maintenant égal à 3
echo "$b";
$c = $a + $b; //$c est maintenant égal à 5
echo "$c";
$d = $c; //$d est maintenant égal à 5
echo $d;
$e = "Bonjour ";
$e .= " les étudiants"; // affecte la valeur "Bonjour les étudiants" à la variable e
echo $e;
$c += $a*2; // $c est maintenant égal à 9 
echo "$c";

// Pour convertir explicitement une valeur en booléen, utilisez (bool) ou (boolean).
$bool_val = (bool)true;
echo $bool_val; // Affiche : 1
$bool_val2 = (bool)false;
echo $bool_val2; // N’affiche rien
$bool_exp1 = (bool)false;
echo $bool_exp1 ? 'true' : 'false'; // Affiche : false
$bool_exp2 = (bool)false;
echo json_encode($bool_exp2); // Affiche : false
$bool_exp3 = (bool)false;
echo var_export($bool_exp3); // Affiche : false
$bool_exp4 = (bool)false;
echo (int)$bool_exp4; // Affiche : 0
$bool_exp5 = (bool)false;
var_dump($bool_exp5); // Affiche les informations d'une variable : boolean (false) 

// un nombre décimal
$a = 1234; echo $a."<br>";
// un nombre octal (équivalent à 83 en décimal)
$a = 0123; echo $a."<br>";
// un nombre octal (à partir de PHP 8.1.0)
#$a = 0o123; echo (int)$a;
// un nombre hexadecimal (équivalent à 26 en décimal)
$a = 0x1A; echo $a."<br>";
// un nombre binaire (équivalent à 255 en decimal)
$a = 0b11111111; echo $a."<br>";
// un nombre décimal (à partir de PHP 7.4.0)
$a = 1_234_567; echo $a."<br>";

// tableau
$tableau1 = array("Salut", "Aloha", "Hello"); 
Echo $tableau1[0]."<br>"; // Afficher : Salut
$tableau3 = array(
    "0" => "Salut" ,
    "1" => "Aloha" ,
    "2" => "Hello" ,
    );
Echo $tableau3[2]; // Afficher : Hello
    
define("nom","KHALID");
echo nom;

echo $_SERVER['PHP_SELF']; echo "<br>";
echo $_SERVER['SERVER_NAME']; echo "<br>";
echo $_SERVER['HTTP_HOST']; echo "<br>";
//echo $_SERVER['HTTP_REFERER']; echo "<br>";
echo $_SERVER['HTTP_USER_AGENT']; echo "<br>";
echo $_SERVER['SCRIPT_NAME']; echo "<br>";


?>



</body>
</html>
