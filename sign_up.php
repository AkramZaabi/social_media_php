<?php
    if(isset($_POST['submit2'])){
        extract($_POST);
        //var_dump($_POST);
        $currentDate = date('Y-m-d');
        $new_password = password_hash ($pwd2, PASSWORD_DEFAULT);
        $sql='INSERT INTO utilisateur(nom,prenom,mail,mdps,photoProfile,dateNaissance,dateInscri,genre) VALUES (?,?,?,?,?,?,?,?)';
        $res=$bdd->prepare($sql);
        $res->execute([$Last_Name,$First_Name,$mail2,$new_password,$image,$date,$currentDate,$Genre]);
        $_SESSION['nom']=$Last_Name;
        $_SESSION['prenom']=$First_Name;
        $_SESSION['mail']=$mail2;
        $_SESSION['mdps']=$pwd2;
        $_SESSION['Photos']=0;
        $_SESSION['Followers']=0;
        $_SESSION['Folloowing']=0;
        header('Location: ./profile/profile.php');
    }
    $template="sign_up";
    $titredepage="sign_up";
    include $template.'.phtml';
?>