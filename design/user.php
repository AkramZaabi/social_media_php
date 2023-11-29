<?php
  
include 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id =$_SESSION['idUtilisateur'];


$template="user";
$confirm=1;
$titredepage="CollabSpot";
if(!isset($friends_db))
{
    $friends_db =  $pdo->prepare("SELECT * from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_db->execute([$id,$confirm]);
    $friends_res = $friends_db->fetchAll(PDO::FETCH_ASSOC);
}
if(!isset ($friends_request))
{
    
    $confirm = 0 ;
    $friends_request =  $pdo->prepare("SELECT * from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_request->execute([$id,$confirm]);
   

}

 var_dump(($friends_res));
 include '../layout.phtml';

?>