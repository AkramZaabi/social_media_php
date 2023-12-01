<?php
    include '../DBconnect.php';
    $template="discussion";
    $titredepage="Chat";
    
    
$idUtilisateur = 1;

$sqlAmis = 'SELECT id_user FROM amis where id_ami = :idUtilisateur';
$resultAmis = $bdd->prepare($sqlAmis);
$resultAmis->execute([
    'idUtilisateur' => $idUtilisateur,
]);
$amis = $resultAmis->fetchAll(PDO::FETCH_ASSOC);

foreach ($amis as $ami) {
    $idAmi = $ami['id_user'];
    $sqlInfoAmi = "SELECT nom, prenom FROM utilisateur WHERE idUtilisateur = :idAmi";
    $resultInfoAmi = $bdd->prepare($sqlInfoAmi);
    $resultInfoAmi->execute([
        'idAmi' => $idAmi,
    ]);
    $infos = $resultInfoAmi->fetch(PDO::FETCH_ASSOC);
    $ami['infoAmi'] = $infos;
    $infosAmis[] = $ami;
}

$bdd = null;

include './layout.phtml';
?>