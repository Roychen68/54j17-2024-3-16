<?php
$pdo =new PDO ("mysql:host=localhost;charset=utf8;dbname=web03","admin","1234");

$id = $_POST['id'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$phone = $_POST['phone'];
$password = $_POST['password'];

$sql = "UPDATE `tickets` SET `first_name`='$firstname',`last_name`='$lastname',`phone`='$phone',`password`='$password' WHERE `id`='$id'";

$pdo ->exec($sql);
?>