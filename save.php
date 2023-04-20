<?php
$username = $_POST["name"];
$password = $_POST["password"];
$email = $_POST["email"];

require_once ("connexion.php");

$req = $pdo->prepare("INSERT INTO users (email,user_name,password) VALUES (?,?,?)");

$params = array($email,$username,$password);
$req->execute($params);

$req1 = $pdo->prepare("select (user_id) from users where email=? and password=?");
$params = array($email,$password);
$req1->execute($params);
$result = $req1->fetch();
$user_id = $result['user_id'];
if($email==null){
    header("location:sign_up_page.php");
}else{
    session_start();
    $_SESSION['user_id'] = $user_id; 
    $_SESSION['user_name'] = $username;
    header("location:first_cycle.php?id=$user_id");
}
?>