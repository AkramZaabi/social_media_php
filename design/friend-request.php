<?php
    session_start();
    include './db_connect/db_connect.php';
    $id_user  = $_SESSION['idUtilisateur'];
    $request = 0 ; // en attente 
    if (isset($id)) {
        $query = $db->prepare("INSERT INTO friends (id_user, id_ami, genreAmitie) VALUES (?, ?, ?)");
        $query->execute([$id_user, $id_ami, $request]);
    }
?>