
<?php
require_once 'connect.php';
include 'header.php';
include '../CC/team.php';

if (isset($_POST['status'])) {
    $status = $_POST['status'];
    $getStatus ="SELECT * FROM user";
    $user = $pdo->prepare($getStatus);
    $user->execute([$status]);
    while($fetchUser=$user->fetch()){
	if ($fetchUser['status'] == 1) {
		echo "<script>alert('Image Uploaded')</script>";
	} else if ($fetchUser['status']  == 2) {
		echo "<script>alert('An error has occured while uploading your image')</script>";
	} else if ($fetchUser['status']  == 3) {
        echo "<script>alert('File too Large')</script>";
    }  else if ($fetchUser['status'] == 4) {
        echo "<script>alert('An error has occured while uploading your image')</script>";
    } else if ($fetchUser['status']  == 5) {
        echo "<script>alert('Image Type not Allowed')</script>";
    }
    }
}
?>