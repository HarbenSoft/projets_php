
<?php
// Setting a cookie
setcookie("username", "BENHAR KHALID", time()+30*24*60*60);

if(isset($_COOKIE["username"])){
    //echo "Bienvenu " .$_COOKIE["username"];
    print_r($_COOKIE['username']);

}else{
    echo "Invité";
}

?>