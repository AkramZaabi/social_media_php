<?php
    session_start();
    if(!isset($_SESSION['idUtilisateur'])){
        header('Location: ../index.php');
        exit();
    }
    include '../db_connect/db_connect.php';
    
    if(!empty($_POST)){
        var_dump($_POST);
        extract($_POST);
        $sql='UPDATE `utilisateur` SET 
            `nom`=?,
            `prenom`=?,
            `mail`=?,
            /*`mdps`=?,*/
            `photoProfile`=?,
            `photoCouverture`=?,
            `dateNaissance`=?,
            `genre`=?,
            `metier`=?
            WHERE idUtilisateur=?';
        $res=$bdd->prepare($sql);
        $res->execute([
            $Last_Name,$First_Name,$mail,$imageProfile,$imageCover,$date,$Genre,$job,$id
        ]);
        /*$_SESSION['idUtilisateur']=$id;
        $_SESSION['nom']=$Last_Name;
        $_SESSION['prenom']=$First_Name;
        $_SESSION['mail']=$mail;
        $_SESSION['photoProfile']=$imageProfile;
        $_SESSION['photoCouverture']=$imageCover;
        $_SESSION['dateNaissance']=$date;
        $_SESSION['genre']=$Genre;
        $_SESSION['metier']=$job;*/
        header('Location: profile.php');
    }







    $sql='SELECT * FROM utilisateur WHERE idUtilisateur=?';
    $res=$bdd->prepare($sql);
    $res->execute([
        $_GET['id']
    ]);
    $user=$res->fetch();

    $template="modify";
    $titredepage="modify";
    include 'layout.phtml';
?>