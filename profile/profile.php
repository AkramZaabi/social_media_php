<?php
    session_start();
    if(!isset($_SESSION['nom'])){
        header('Location: ../homePage.php');
        exit();
    }
    var_dump($_SESSION);
    include '../DBconnect.php';
    $template="profile";
    $titredepage="Profile";
    include 'layout.phtml';
?>