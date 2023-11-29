<?php
       session_start();
       include 'C:\xampp\htdocs\project-php-sem1\db_connect\db_connect.php';

    $id_user  = $_SESSION['idUtilisateur'];
    $request =  0; // en attente 
    $id_ami = $_GET['id_ami'];
    if (isset($id_ami)) {
        $query = $pdo->prepare("INSERT INTO amis (id_user, id_ami, genreAmitie) VALUES (?, ?, ?)");
        $query->execute([$id_user, $id_ami, $request]);
    }
    include './user.php';
    
?>