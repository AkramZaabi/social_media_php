<?php
       
       require '../db_connect/db_connect.php';
       if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    $id =$_SESSION['idUtilisateur'];
    echo $id;
    $id_user  = $id;
    $request =  0; // en attente 
    $id_ami = $_GET['id_ami'];
    if (isset($id_ami)) {
       
        $query = $pdo->prepare("INSERT INTO amis (id_user, id_ami, genreAmitie) VALUES (?, ?, ?)");
        $query->execute([$id_ami, $id_user, $request]);
    }
   header('Location: user.php');
    
?>