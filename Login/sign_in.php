<?php
    if(isset($_POST['submit'])){
        extract($_POST);
        $sql='SELECT * FROM utilisateur WHERE mail=:mail';
        $res=$pdo->prepare($sql);
        $res->execute([
            'mail'=>$mail,
        ]);
        $user=$res->fetch();
        if(!$user){
            goto show_form;
        }
        else{
            if(password_verify($pwd, $user['mdps'])) {
                $_SESSION['idUtilisateur']=$user['idUtilisateur'];
                header('Location: ./design/user.php');
                exit();
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