<?php
//creation de la chaine de connexion
$str="mysql:host=localhost; dbname=intimate_calendar";
try {
    $pdo = new PDO($str, 'root', '');
    
} catch (PDOException $e) {
    $msg = "erreur PDO".$e->getMessage();
    //affiche le message et sort du script
    die($msg);
}
?>