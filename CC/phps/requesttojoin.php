<?php
require_once 'connect.php';
HEADER("content-type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamcode = $_POST['teamcode'];
    $username = $_SESSION['username'];
    if(empty($username)){
        header("Location:../league.php?NotSignedIN");
    }

    $user = "SELECT * FROM user WHERE username = ?";
    $userdata=$pdo->prepare($user);
    $userdata->execute([$username]);
    $users = $userdata->fetch();
    
    $getTeam = "SELECT * FROM team WHERE id_team=?";
    $teamdata = $pdo->prepare($getTeam);
    $teamdata->execute([$teamcode]);
    $teams = $teamdata->fetch();
    if (empty($teamcode)) {
        header("Location:../phps/jointeam.php?Empty");
        $result['error'] = 'Team Code Must Have Value!';
    }  else {
            if(in_array($teamcode,$teams))  {
                $request = "INSERT INTO request VALUES(?,?,?,?)";
                $stmt = $pdo->prepare($request);
                $stmt->execute([$users['id_user'] ,$users['username'],$teams['id_owner'],$teams['id_team']]);
                header("Location:../team.php?Success");
            } else {
                header("Location:../team.php?TeamNotFound");
            }
        }
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );
    echo json_encode($error);
    header("Location:../team.php");
}
?>