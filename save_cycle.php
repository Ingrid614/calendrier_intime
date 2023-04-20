<?php
require_once("connexion.php");

session_start();
$date = $_POST["date"];
$duree = $_POST["duree"];
$cycle = $_POST["cycle"];
$user_id = $_GET["id"];

$req = $pdo->prepare("UPDATE users SET cycle=?,duree=? WHERE user_id=?");
$params = array($cycle,$duree,$user_id);
$req->execute($params);

$req2 = $pdo->prepare("INSERT INTO avoir_regles (user_id,date) VALUES(?,?)");
$params2 = array($user_id,$date);
$req2->execute($params2);

$_SESSION['cycle'] = $cycle;
$_SESSION['duree'] = $duree;
$_SESSION['date'] = $date;

header("location:home_page.php?id=$user_id");
?>