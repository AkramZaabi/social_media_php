<?php
    session_start();
    if(!isset($_SESSION['idUtilisateur'])){
        header('Location: ../index.php');
        exit();
    }
    include '../db_connect/db_connect.php';
    
    if(isset($_GET['id_ami']))
    {
        $id_ami = $_GET['id_ami'];    
        $req='SELECT * FROM utilisateur where idUtilisateur=?';
        $res=$pdo->prepare($req);
        $res->execute([
            $id_ami,
        ]);
        $user = $res->fetch();
        $sql  =  'SELECT * FROM publication where idUtilisateur=?';
        $pub=$pdo->prepare($sql);
        $pub->execute([
            $id_ami,
        ]);
        $pub=$pub->fetchAll();
        var_dump($pub);
        
    }
    else{

        $req='SELECT * FROM utilisateur where idUtilisateur=?';
        $res=$pdo->prepare($req);
        $res->execute([
            $_SESSION['idUtilisateur'],
        ]);
        $user=$res->fetch();


        $sql  =  'SELECT * FROM publication where idUtilisateur=?';
        $pub=$pdo->prepare($sql);
        $pub->execute([
            $_SESSION['idUtilisateur'],
        ]);
        $pub=$pub->fetchAll();
  
        
    }
    $template="profile";
    $titredepage="Profile";
    include 'layout.phtml';
?>