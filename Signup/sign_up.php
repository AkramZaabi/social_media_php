<?php
    if(isset($_POST['submit2'])){
        extract($_POST);
        $sql='SELECT * FROM utilisateur WHERE mail=:mail';
        $res=$pdo->prepare($sql);
        $res->execute([
            'mail'=>$mail2,
        ]);
        $user=$res->fetch();
        if(!$user){
            $namephoto=$_FILES['image']['name'];
            $type_extention=pathinfo($namephoto,PATHINFO_EXTENSION);
            $newName=md5($namephoto).'.'.$type_extention;
            $new_path='assets/'.$newName;
            move_uploaded_file($_FILES['image']['tmp_name'],$new_path);
            $photo = 'assets/'.$newName;
            if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
                echo('Upload failed with error code ' . $_FILES['image']['error']);
            }
            // Move the uploaded file to the destination folder
            $currentDate = date('Y-m-d');
            $new_password = password_hash ($pwd2, PASSWORD_DEFAULT);
            $sql='INSERT INTO utilisateur(nom,prenom,mail,mdps,photoProfile,dateNaissance,dateInscri,genre) VALUES (?,?,?,?,?,?,?,?)';
            $res=$pdo->prepare($sql);
            $res->execute([$Last_Name,$First_Name,$mail2,$new_password,$photo,$date,$currentDate,$Genre]);
            $req='SELECT idUtilisateur From utilisateur where mail=? and mdps=?';
            $res=$pdo->prepare($req);
            $res->execute([
                $mail2,$new_password
            ]);
            $user=$res->fetch();
            $_SESSION['idUtilisateur']=$user['idUtilisateur'];
            header('Location: ./profile/profile.php');
        }
    }
    $template="sign_up";
    $titredepage="sign_up";
    include $template.'.phtml';
?>