<?php 
require_once './phps/connect.php';
// include '../team.php';
HEADER("content-type:application/json");

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
 
    return $random_string;
}
$checker = false;
do {
    $rand = generate_string($permitted_chars,8);
    $result = "SELECT id_team FROM team WHERE id_team = :id_team";
    $resfetch = $pdo->prepare($result);
    $resfetch->execute(array(':id_team' => $rand));
    $fetch = $resfetch->fetch();
    echo $fetch;
    if($fetch == 0) {
        $checker = true;
    }
} while(!$checker);



if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $allow = array('jpg','jpeg','svg','png');

    $teamName = $_POST['teamname'];
    $username =$_SESSION['username'];
    $imgName = $_FILES['image']['name'];

    $user = "SELECT * FROM user WHERE username = ?";
    $userdata=$pdo->prepare($user);
    $userdata->execute([$username]);
    $users = $userdata->fetch();
    
    $fileBasename = basename($_FILES['image']['name']);
    $fileSize = $_FILES['image']['size'];
    $fileTempName = $_FILES['image']['tmp_name'];

    $fileError = $_FILES['image']['error'];
    $fileType = $_FILES['image']['type'];
    $fileExt = explode('.',$imgName);
    $fileExtension = strtolower(end($fileExt));
    //$fileExtension = strtolower(pathinfo($fileBasename, PATHINFO_EXTENSION));
    

    $imgNewName = uniqid('',true).".".$fileExtension;
    $destination ="./data/logo/";

    $targetDir = $destination.$imgNewName;
    
    if(in_array($fileExtension, $allow)) {
        if($fileError === 0 ){
            if($fileSize < 1000000) {
                $upload = move_uploaded_file($fileTempName,$targetDir);
                    $sql = "INSERT INTO team values (?,?,default,?,default,?)";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$rand,$users['id_user'],$teamName,$targetDir]);
                    $idteam ="UPDATE user SET id_team=? WHERE id_user=?";
                    $stmt1 = $pdo->prepare($idteam);
                    $stmt1->execute([$rand,$users['id_user']]);
                header("Location:./team.php?Success");
                exit();
            } else {
                header("Location:./team.php?PictureTooLarge");
                exit();
            }
        } else {
            header("Location:./team.php?FileError");
            exit();
        }
    } else {
        header("Location:./team.php?FileTypeNotAllowed");
        exit();
    }
    
} else {
    header("Location:./index.php");
}
?>