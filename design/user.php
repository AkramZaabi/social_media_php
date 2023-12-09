<?php
  
include 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id =$_SESSION['idUtilisateur'];

$user = $pdo->prepare("SELECT nom,prenom from utilisateur where idUtilisateur = ?");
$user->execute([$id]);
$user = $user->fetch();
$template="user";
$confirm=1;
$titredepage="CollabSpot";
if(!isset($friends_res))
{
    

    $friends_db =  $pdo->prepare("SELECT nom,prenom,idUtilisateur,photoProfile from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_db->execute([$id,$confirm]);
    $friends_res = $friends_db->fetchAll(PDO::FETCH_ASSOC);

}
if(!isset ($friends_request))
{
    
    $confirm = 0 ;
    $friends_request =  $pdo->prepare("SELECT idUtilisateur,nom ,prenom ,photoProfile from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_request->execute([$id,$confirm]);
    $friends_req = $friends_request->fetchAll();
    
   

}

 
 include '../layout.phtml';

?>