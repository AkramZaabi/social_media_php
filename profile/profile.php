<?php
    session_start();
    if(!isset($_SESSION['idUtilisateur'])){
        header('Location: ../index.php');
        exit();
    }
    include '../db_connect/db_connect.php';
    $req='SELECT * FROM utilisateur where idUtilisateur=?';
    $res=$bdd->prepare($req);
    $res->execute([
        $_SESSION['idUtilisateur'],
    ]);
    $user=$res->fetch();
    $template="profile";
    $titredepage="Profile";
    include 'layout.phtml';
?>