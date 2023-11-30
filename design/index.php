<?php
    session_start();
    include '../DBconnect.php';

    /*if (!isset($_SESSION['idUtilisateur'])) {
        header("Location: ../sign_in.php");
        exit();
    }*/

    /*$id = $_SESSION['idUtilisateur'];*/
    $id = 1;
    $query=$bdd->prepare("SELECT * FROM notification WHERE idUtilisateur = :id ORDER BY dateNotification DESC, heureNotification DESC");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $notifications = $query->fetchAll(PDO::FETCH_ASSOC);

    $query =$bdd->prepare("SELECT * FROM message WHERE idEmetteur = :id OR idRecepteur = :id ORDER BY dateMsg DESC, heureMsg DESC");
    $query->bindParam(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $messages = $query->fetchAll(PDO::FETCH_ASSOC);

    $queryUser = $bdd->prepare("SELECT nom FROM utilisateur WHERE idUtilisateur = :id");
    $queryUser->bindParam(':id', $notification['idUtilisateur'], PDO::PARAM_INT);
    $queryUser->execute();
    $userInfo = $queryUser->fetch(PDO::FETCH_ASSOC);


    $titredepage="CollabSpot";
    $template="index";
    include "../layout.phtml";
?>