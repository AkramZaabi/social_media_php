<?php
    include '../DBconnect.php';
    include 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
    $template="discussion";
    $titredepage="Chat";
    
    
$idUtilisateur = 1;

$sqlAmis = "SELECT id_user FROM amis where id_ami = '$idUtilisateur'";
$resultAmis = $bdd->query($sqlAmis);
$amis = [];


while ($rowAmi = $resultAmis->fetch()) {
    $idAmi = $rowAmi['id_user'];

    $sqlMessages = "SELECT message.*, utilisateur.nom, utilisateur.prenom
                    FROM message
                    JOIN utilisateur ON (message.idEmetteur = utilisateur.idUtilisateur OR message.idRecepteur = utilisateur.idUtilisateur)
                    WHERE (idEmetteur = $idUtilisateur AND idRecepteur = $idAmi) OR (idEmetteur = $idAmi AND idRecepteur = $idUtilisateur)
                    ORDER BY message.date, message.heure DESC
                    LIMIT 1"; // LIMIT 1 pour afficher seulement le dernier message

    $resultMessages = $bdd->query($sqlMessages);

    if ($rowMessage = $resultMessages->fetch()) {
        $rowAmi['lastMessage'] = $rowMessage;
    }

    $amis[] = $rowAmi;
}
var_dump($amis);
$bdd = null;

include './layout.phtml';
?>