<?php
    require '../db_connect/db_connect.php';

    $template="discussion";
    $titredepage="Chat";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $id =$_SESSION['idUtilisateur'];
$confirm = 1 ;    
    if( isset($_GET['id_ami']))
    {
        //echo ($_GET['id_ami']);


        $messages =  $pdo->prepare("SELECT * from message where (idEmetteur=? and idRecepteur=?) or (idEmetteur=? and idRecepteur=?) order by(idMsg)");
        $messages->execute([$id,$_GET['id_ami'],$_GET['id_ami'],$id]);
        $results_messages= $messages->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($results_messages);

        $user =  $pdo->prepare("SELECT * from utilisateur where idUtilisateur=?");
        $user->execute([$id]);
        $profile_user= $user->fetch(PDO::FETCH_ASSOC);
        //var_dump($profile_user);


        $ami =  $pdo->prepare("SELECT * from utilisateur where idUtilisateur=?");
        $ami->execute([$_GET['id_ami']]);
        $profile_ami= $ami->fetch(PDO::FETCH_ASSOC);
        //var_dump($profile_ami);




    }
$idUtilisateur = 1;
$infosAmis = [];
/*$friends_db =  $pdo->prepare("SELECT id_user from amis , utilisateur where id_ami =idUtilisateur and id_user =? and genreAmitie=?;");
    $friends_db->execute([$id,$confirm]);
    $amis= $friends_db->fetchAll(PDO::FETCH_ASSOC); */
    $friends_db =  $pdo->prepare("SELECT id_ami from amis where id_user=? and genreAmitie=?");
    $friends_db->execute([$id,$confirm]);
    $amis= $friends_db->fetchAll(PDO::FETCH_ASSOC);
//var_dump($amis);

foreach ($amis as $ami) {
   
    $idAmi = $ami['id_ami'];
    $sqlInfoAmi = "SELECT nom, prenom ,idUtilisateur,photoProfile FROM utilisateur WHERE idUtilisateur = :idAmi";
    $resultInfoAmi = $pdo->prepare($sqlInfoAmi);
    $resultInfoAmi->execute([
        'idAmi' => $idAmi,
    ]);
    $infos = $resultInfoAmi->fetch(PDO::FETCH_ASSOC);
    $ami['infoAmi'] = $infos;
    //var_dump($ami['infoAmi']['nom']);
    array_push($infosAmis,$ami['infoAmi']);
}

//var_dump($infosAmis); 

$pdo = null;

include '../layout.phtml';
?>