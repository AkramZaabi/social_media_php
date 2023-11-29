<?php
   session_start();
   $id =$_SESSION['idUtilisateur'];
include 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
$template="user";
$confirm=1;
$titredepage="CollabSpot";
 $friends_db =  $pdo->prepare("SELECT * from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
 $friends_db->execute([$id,$confirm]);
 $confirm = 0 ;
 $friends_request =  $pdo->prepare("SELECT * from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
 $friends_request->execute([$id,$confirm]);

 include '../layout.phtml';

?>