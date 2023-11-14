<?php

$pdo =new PDO('mysql:host=localhost;dbname=project_php','root','') ;

$query_admin= $pdo->query('SELECT * FROM  admin ');
$query_class=  $pdo->query('SELECT * FROM  class ');
$query_document =  $pdo->query('SELECT * FROM  document ');


 $admin = $query_admin->fetchAll();
 $class = $query_class->fetchAll();
 $document = $query_document->fetchAll();




?>
