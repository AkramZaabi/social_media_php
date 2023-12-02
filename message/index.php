<?php
    require 'C:\xampp\htdocs\project-php-sem1\db_connect\db_connect.php';

    $template="discussion";
    $titredepage="Chat";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $id =$_SESSION['idUtilisateur'];
$confirm = 1 ;    
    if( isset($_GET['id_ami']))
    {
        echo ($_GET['id_ami']);
    }
$idUtilisateur = 1;
$infosAmis = [];
$friends_db =  $pdo->prepare("SELECT id_user from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_db->execute([$id,$confirm]);
    $amis= $friends_db->fetchAll(PDO::FETCH_ASSOC); 
foreach ($amis as $ami) {
   
    $idAmi = $ami['id_user'];
    $sqlInfoAmi = "SELECT nom, prenom ,idUtilisateur FROM utilisateur WHERE idUtilisateur = :idAmi";
    $resultInfoAmi = $pdo->prepare($sqlInfoAmi);
    $resultInfoAmi->execute([
        'idAmi' => $idAmi,
    ]);
    $infos = $resultInfoAmi->fetch(PDO::FETCH_ASSOC);
    $ami['infoAmi'] = $infos;
    //var_dump($ami['infoAmi']['nom']);
    array_push($infosAmis,$ami['infoAmi']);
}

var_dump($infosAmis); 

$pdo = null;

include '../layout.phtml';
?>