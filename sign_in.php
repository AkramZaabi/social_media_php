<?php
    if(isset($_POST['submit'])){
        extract($_POST);
        $sql='SELECT * FROM utilisateur WHERE mail=:mail';
        $res=$bdd->prepare($sql);
        $res->execute([
            'mail'=>$mail,
        ]);
        $user=$res->fetch();
        $new_password = password_hash ($pwd, PASSWORD_DEFAULT);
        var_dump($new_password);
        if(!$user){
            goto show_form;
        }
        else{
            if(password_verify($pwd, $user['mdps'])) {
                $_SESSION['id']=$user['id'];
                $_SESSION['nom']=$user['nom'];
                $_SESSION['prenom']=$user['prenom'];
                $_SESSION['mail']=$user['mail'];
                $_SESSION['mdps']=$user['mdps'];
                $_SESSION['photoProfile']=$user['photoProfile'];
                $_SESSION['photoCouverture']=$user['photoCouverture'];
                $_SESSION['dateNaissance']=$user['dateNaissance'];
                $_SESSION['dateInscri']=$user['dateInscri'];
                $_SESSION['genre']=$user['genre'];
                $_SESSION['metier']=$user['metier'];
                $_SESSION['bio']=$user['bio'];
                header('Location: ./profile/profile.php');
            }
            else{
                goto show_form;
            }
        }
        show_form:
    }
    $template="sign_in";
    $titredepage="sign_in";
    include $template.'.phtml';
?>