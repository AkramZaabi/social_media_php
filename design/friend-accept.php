<?php
require '../db_connect/db_connect.php';

if(isset($_GET['id_ami']))
{
    $id_ami = $_GET['id_ami'];
    $confirm=1;
    $sql = $pdo->prepare("UPDATE amis SET genreAmitie = ? WHERE id_ami = ?");
    $sql->execute([$confirm,$id_ami]);
}
header('Location:./user.php');

?>