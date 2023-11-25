<?php
    session_start();
    if(!isset($_SESSION['nom'])){
        header('Location: ../index.php');
        exit();
    }
    //var_dump($_SESSION);
    include '../db_connect/db_connect.php';
    $template="profile";
    $titredepage="Profile";
    include 'layout.phtml';
?>