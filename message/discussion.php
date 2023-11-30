<?php
    include '../DBconnect.php';
    include 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
    $template="discussion";
    $titredepage="Chat";
    try {
        $bdd = new PDO('mysql:host='.DB_HOST. ';dbname='.DB_NAME, DB_USER, DB_PASS);
        $bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connexion réussie à la base de données.";
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    
    
$idUtilisateur = 1; // Remplacez 1 par l'ID de l'utilisateur connecté

$sqlAmis = "SELECT DISTINCT utilisateur.idUtilisateur, utilisateur.nom, utilisateur.prenom
            FROM utilisateur
            JOIN message ON (message.idEmetteur = utilisateur.idUtilisateur OR message.idRecepteur = utilisateur.idUtilisateur)
            WHERE (message.idEmetteur = $idUtilisateur OR message.idRecepteur = $idUtilisateur) AND utilisateur.idUtilisateur <> $idUtilisateur";

$resultAmis = $bdd->query($sqlAmis);
$amis = [];


while ($rowAmi = $resultAmis->fetch()) {
    $idAmi = $rowAmi['idUtilisateur'];
    $nomAmi = $rowAmi['nom'];
    $prenomAmi = $rowAmi['prenom'];

    $sqlMessages = "SELECT message.*, utilisateur.nom, utilisateur.prenom
                    FROM message
                    JOIN utilisateur ON (message.idEmetteur = utilisateur.idUtilisateur OR message.idRecepteur = utilisateur.idUtilisateur)
                    WHERE (message.idEmetteur = $idUtilisateur AND message.idRecepteur = $idAmi) OR (message.idEmetteur = $idAmi AND message.idRecepteur = $idUtilisateur)
                    ORDER BY message.date, message.heure DESC
                    LIMIT 1"; // LIMIT 1 pour afficher seulement le dernier message

    $resultMessages = $bdd->query($sqlMessages);

    if ($rowMessage = $resultMessages->fetch()) {
        $rowAmi['lastMessage'] = $rowMessage;
    }

    $amis[] = $rowAmi;
}
var_dump($amis);
// Fermer la connexion à la base de données
$bdd = null;

// Inclure le fichier .phtml
include './layout.phtml';
?>