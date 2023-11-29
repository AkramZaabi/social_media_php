<?php
    if(isset($_POST['submit2'])){
        extract($_POST);
        //var_dump($_POST);
        /**image uplpoad  */
       
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
        //var_dump($user);
        /*$_SESSION['nom']=$Last_Name;
        $_SESSION['prenom']=$First_Name;
        $_SESSION['mail']=$mail2;
        $_SESSION['mdps']=$pwd2;
        $_SESSION['Photos']=0;
        $_SESSION['Followers']=0;
        $_SESSION['Folloowing']=0;*/
      header('Location: ./profile/profile.php');
    }
    $template="sign_up";
    $titredepage="sign_up";
    include $template.'.phtml';
?>