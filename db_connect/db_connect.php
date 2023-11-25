<?php

$pdo =new PDO('mysql:host=localhost;dbname=project_php','root','') ;

$query_admin= $pdo->query('SELECT * FROM  admin ');
$query_class=  $pdo->query('SELECT * FROM  class ');
$query_commentaire =  $pdo->query('SELECT * FROM  commentaire ');
$query_evenement =  $pdo->query('SELECT * FROM  evenement ');
$query_message =  $pdo->query('SELECT * FROM  message ');
$query_amis =  $pdo->query('SELECT * FROM  amis ');
$query_user =  $pdo->query('SELECT * FROM  utilisateur ');
$query_publication =  $pdo->query('SELECT * FROM  publication ');
$query_participant =  $pdo->query('SELECT * FROM  participant ');
$query_reactions =  $pdo->query('SELECT * FROM  reagir ');




 $admin = $query_admin->fetchAll();
 $class = $query_class->fetchAll();
 $utilisateur = $query_document->fetchAll();
 $user = $query_user->fetchAll();
 $amis=$query_amis->fetchAll();
 $publications = $query_publication->fetchAll();
 $participant = $query_amis->fetchAll();
 $reactions = $query_reactions ->fetchAll();
 $evenement * $query_evenement->fetchAll();





?>
