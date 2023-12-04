<?php
    require 'C:\xampp\htdocs\project-php-sem1\db_connect\db_connect.php';

    $template="discussion";
    $titredepage="Chat";
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $id =$_SESSION['idUtilisateur'];
$confirm = 1 ;    
if (isset($_POST['submit'])) {
    var_dump($_POST);

    $message = $_POST['message'];
    $id_ami = $_POST['id_ami'];
    $currentDate = date('Y-m-d');
    $heure = date("h:i:sa");

    $sql = "INSERT INTO message (idEmetteur, idRecepteur, contenuMsg, dateMsg, heureMsg) VALUES (?, ?, ?, ?, ?)";
    $msg = $pdo->prepare($sql);
    $msg->execute([$id, $id_ami, $message, $currentDate, $heure]);
}
    if( isset($_GET['id_ami']))
    {
        $id_ami = $_GET['id_ami'];

        var_dump($id_ami);
        
        $message_ami =  $pdo->prepare("SELECT *from message where (idEmetteur=? and idRecepteur=?) or (idEmetteur=? and idRecepteur=?) ORDER by idMsg");
        $message_ami->execute([$_GET['id_ami'],$id,$id,$_GET['id_ami']]);
        $results_message_ami= $message_ami->fetchAll(PDO::FETCH_ASSOC);
        var_dump(($results_message_ami));

        $user =  $pdo->prepare("SELECT * from utilisateur where idUtilisateur=?");
        $user->execute([$id]);
        $profile_user= $user->fetch(PDO::FETCH_ASSOC);

        $profile_ami =  $pdo->prepare("SELECT * from utilisateur where idUtilisateur=?");
        $profile_ami->execute([$id]);
        $profile_ami= $profile_ami->fetch(PDO::FETCH_ASSOC);
    }
   
    
$idUtilisateur = 1;
$infosAmis = [];

$friends_db =  $pdo->prepare("SELECT id_ami from amis where id_user=? and genreAmitie=?");
    $friends_db->execute([$id,$confirm]);
    $amis= $friends_db->fetchAll(PDO::FETCH_ASSOC);

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

$pdo = null;

include '../layout.phtml';
?>