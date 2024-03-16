<?php
$pdo = new PDO ("mysql:host=localhost;charset=utf8;dbname=web03","admin","1234");

$id = $_POST['id'];

$sql = "DELETE FROM `tickets` WHERE `id` = '$id'";

$pdo->exec($sql)
?>