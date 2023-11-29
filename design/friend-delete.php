<?php 

session_start();

require 'C:\xampp\htdocs\project-php-sem1\db_connect/db_connect.php';
$id = $_SESSION['idUtilisateur'];
if(isset($_GET['id_ami']))
{
    $id_ami = $_GET['id_ami'];
    $del_query = $pdo->prepare("DELETE FROM amis WHERE id_user=? AND id_ami=?");
    $del_query->execute([$id, $id_ami]);

}
header('Location:./user.php');


?>