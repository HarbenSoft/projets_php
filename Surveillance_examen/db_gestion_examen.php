<?php
        $server = "localhost";
        $db = "gestion_exam";
        $user="root";
        $password="";

        try{
            $pdo = new PDO("mysql:host=$server; dbname=$db",$user,$password);
        }catch(PDOException $e){
            echo "impossible de se connecter à la base de données ! ". $e.getMessage();
        }
?>