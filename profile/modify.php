<?php
    session_start();
    if(!isset($_SESSION['idUtilisateur'])){
        header('Location: ../index.php');
        exit();
    }
    include '../db_connect/db_connect.php';
    
    if(!empty($_POST)){
        
        extract($_POST);
            /**photo de  profile imageProfile*/
            $namephoto_profile=$_FILES['imageProfile']['name'];
            $type_extention_1=pathinfo($namephoto_profile,PATHINFO_EXTENSION);
            $newName_1=md5($namephoto_profile).'.'.$type_extention_1;
            $new_path_1='../assets/'.$newName_1;
            move_uploaded_file($_FILES['imageProfile']['tmp_name'],$new_path_1);
            $photo_1 = '../assets/'.$newName_1;
            if ($_FILES['imageProfile']['error'] !== UPLOAD_ERR_OK) {
                echo('Upload failed with error code ' . $_FILES['imageProfile']['error']);
            }

            /**photo  de  couverture  imageCover  */
            $namephoto_couverture=$_FILES['imageCover']['name'];
            $type_extention_2=pathinfo($namephoto_couverture,PATHINFO_EXTENSION);
            $newName_2=md5($namephoto_couverture).'.'.$type_extention_2;
            $new_path_2='../assets/'.$newName_2;
            move_uploaded_file($_FILES['imageCover']['tmp_name'],$new_path_2);
            $photo_2 = '../assets/'.$newName_2;
            if ($_FILES['imageCover']['error'] !== UPLOAD_ERR_OK) {
                echo('Upload failed with error code ' . $_FILES['imageCover']['error']);
            }

        $sql='UPDATE utilisateur SET 
            `nom`=?,
            `prenom`=?,
            `mail`=?,
            `photoProfile`=?,
            `photoCouverture`=?,
            `dateNaissance`=?,
            `genre`=?,
            `metier`=?
            WHERE idUtilisateur=?';
        $res=$pdo->prepare($sql);
        $res->execute([
            $Last_Name,$First_Name,$mail,$photo_1,$photo_2,$date,$Genre,$job,$id
        ]);
       header('Location: profile.php');
    }







    $sql='SELECT * FROM utilisateur WHERE idUtilisateur=?';
    $res=$pdo->prepare($sql);
    $res->execute([
        $_SESSION['idUtilisateur']
    ]);
    $user=$res->fetch();

    $template="modify";
    $titredepage="modify";
    include 'layout.phtml';
?>