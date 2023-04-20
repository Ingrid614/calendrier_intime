<?php
$email = $_POST["email"];
$password  = $_POST["password"];

require_once ("connexion.php");

$req1 = $pdo->prepare("select user_id,user_name,duree,cycle from users where email=? and password=?");
$params = array($email,$password);
$req1->execute($params);
$result = $req1->fetch();
$user_id = $result['user_id'];
$user_name = $result['user_name'];
$duree = $result['duree'];
$cycle = $result['cycle'];

$req2 = $pdo->prepare("select MAX(date) from avoir_regles where user_id=?");

$params2 = array($user_id);
$req2->execute($params2);
$result2 = $req2->fetch();
$date = $result2['MAX(date)'];
if($user_id == null){
    header("location:index.php");
}else{
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['duree'] = $duree;
    $_SESSION['cycle'] = $cycle;
    $_SESSION['user_name'] = $user_name;
    $_SESSION['date'] = $date; 
    header("location:home_page.php?id=$user_id");
}
?>