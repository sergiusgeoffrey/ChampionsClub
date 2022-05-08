<?php 
require_once 'connect.php';
HEADER("content-type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamcode = $_POST['teamcode'];
    $username = $_SESSION['username'];

    $user = "SELECT * FROM user WHERE username = ?";
    $userdata=$pdo->prepare($user);
    $userdata->execute([$username]);
    $users = $userdata->fetch();
    
    $getTeam = "SELECT * FROM team WHERE id_team=?";
    $stmt = $pdo->prepare($getTeam);
    $stmt->execute([$teamcode]);
    $res = $stmt->fetch();
    
    if ($teamcode == '') {
        header("Location:../phps/jointeam.php?status=empty");
        $result['error'] = 'Team Code Must Have Value!';
    } 
    else {
        if  (in_array($teamcode,$res))  {
        $update = "UPDATE team SET jumlah_anggota = ? WHERE id_team=?";
        $stmt = $pdo->prepare($update);
        $stmt->execute([$res['jumlah_anggota']+=1 ,$res['id_team']]);

        $idteam ="UPDATE user SET id_team=? WHERE username=?";
        $stmt1 = $pdo->prepare($idteam);
        $stmt1->execute([$teamcode,$users['username']]);
        header("Location:../team.php?joined");
        }
        else    {
            header("Location:../team.php?teamNotFound");
        }
    }

} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );
    echo json_encode($error);
}

?>