<?php
// Assuming you have an array of friends
//include './db_connect/db_connect.php';

require '../db_connect/db_connect.php';
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$id =$_SESSION['idUtilisateur'];


// Retrieve the search term from the form
if(isset($_GET['search_friends']))
{
    $searchTerm = $_GET['search_friends'];
    $name_search="%".$searchTerm."%";
    $sql = $pdo->prepare("SELECT * FROM utilisateur WHERE (prenom LIKE '$name_search' ) OR (nom LIKE '$name_search')");
    $sql->execute();
    $friends = $sql->fetchAll();
     if (!empty($friends))
    {
      $msg= 1 ;   
     }
    else{
       $msg = 0 ; 
    }
    $_GET['search_friends']=NULL;
   

}
else{
    header('Location:./user.php');
}
 
 

    include './user.php';
 

?>
