<?php
require_once("connexion.php");

$previous_password = $_POST['previous_password'];
$new_password = $_POST['new_password'];
$confirm_password = $_POST['confirm_password'];
$user_id = $_GET['id'];
$req1 = $pdo->prepare("SELECT password FROM users WHERE user_id=?");
$param1 = array($previous_password);
$req1->execute($param1);

?>