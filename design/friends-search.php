<?php
// Assuming you have an array of friends
include './db_connect/db_connect.php';

// Retrieve the search term from the form
if(isset($_POST['search_friends']))
{
    $searchTerm = $_POST['search_friends'];
    $sql = "SELECT * FROM users WHERE prenom LIKE '%$searchTerm%' OR nom LIKE '%$searchTerm%'";
    $friends_query= $conn->query($sql);
    $friends = $friends_query->fetchAll();
}



include './index.phtml';
?>
