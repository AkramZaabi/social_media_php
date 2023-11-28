<?php
// Assuming you have an array of friends
//include './db_connect/db_connect.php';
session_start();
include 'C:\xampp\htdocs\project-php-sem1\db_connect\db_connect.php';
// Retrieve the search term from the form
if(isset($_GET['search_friends']))
{
    $searchTerm = $_GET['search_friends'];
    $sql = $pdo->query("SELECT * FROM utilisateur WHERE (prenom LIKE '$searchTerm' )OR (nom LIKE '$searchTerm')");
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

 
 

    include './user.php';
 

?>
