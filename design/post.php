<?php
require '../db_connect/db_connect.php';
session_start();
$id =$_SESSION['idUtilisateur'];
if(isset($_POST['submit'])){
    $pub = $_POST['pub'];
    if($_FILES['image']['name']!='')
    {
        $imageName = $_FILES['image']['name'];
$imageTypeExtension = pathinfo($imageName, PATHINFO_EXTENSION);
$newImageName = md5($imageName) . '.' . $imageTypeExtension;
$newImagePath = 'assets/' . $newImageName;

move_uploaded_file($_FILES['image']['tmp_name'], $newImagePath);

if ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
    echo ('Image upload failed with error code ' . $_FILES['image']['error']);
} else {
    // Process successful image upload
    $newImagePath="";
}
    }
else{
    $newImagePath="";
}

if($_FILES['video']['name']!='')
{
    $videoName = $_FILES['video']['name'];
$videoTypeExtension = pathinfo($videoName, PATHINFO_EXTENSION);
$newVideoName = md5($videoName) . '.' . $videoTypeExtension;
$newVideoPath = 'assets/' . $newVideoName;

move_uploaded_file($_FILES['video']['tmp_name'], $newVideoPath);

if ($_FILES['video']['error'] !== UPLOAD_ERR_OK) {
    echo ('Video upload failed with error code ' . $_FILES['video']['error']);
} else {
    $newVideoPath = "" ; 
    // Process successful video upload
}
}
else{
    $newVideoPath = "" ;
}

    $currentDate = date('Y-m-d');
    $heure = date("h:i:sa");
    $sql='insert into publication(idUtilisateur,contenuPub,video,image,datePub,heurePub) values(?,?,?,?,?,?);';
    $publications=$pdo->prepare($sql);
    $publications->execute([$id,$pub,$newVideoPath,$newImagePath,$currentDate,$heure]);
}


include 'user.php';

?>