<?php

include 'connexionbdd.php';

$idd = intval($_GET['idd']);
$sql = "delete from user where id=?";
$stmt = $pdo->prepare($sql);

$stmt->bindValue(1, $idd, PDO::PARAM_INT);


$stmt->execute();

header('location:profil.php');

 
?>