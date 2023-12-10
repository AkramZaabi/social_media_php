<?php
require '../db_connect/db_connect.php';
$sql = 'select * from publication order by idPub desc';
$pub = $pdo->prepare($sql);
$pub->execute();
$res = $pub->fetchAll();
?>