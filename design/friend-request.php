<?php
       
       require 'C:\xampp\htdocs\project-php-sem1\db_connect\db_connect.php';
       if (session_status() == PHP_SESSION_NONE) {
        session_start();
        }
    $id =$_SESSION['idUtilisateur'];
    echo $id;
    $id_user  = $id;
    $request =  0; // en attente 
    $id_ami = $_GET['id_ami'];
    if (isset($id_ami)) {
       
            $already = 1 ; 
        
   /* $exist = $pdo->prepare("SELECT * FROM amis WHERE (id_user = ? AND id_ami = ? AND genreAmitie = ?) and (id_user = ? AND id_ami = ? AND genreAmitie = ?)  ");
    $exist->execute([$id_user, $id_ami, $already, $id_ami,$id_user, $already]);
    $check_friend = $exist->fetch();*/
        
            $query = $pdo->prepare("INSERT INTO amis (id_user, id_ami, genreAmitie) VALUES (?, ?, ?)");
            $query->execute([$id_ami, $id_user, $request]);
        
    
    }
   header('Location: user.php');
    
?>