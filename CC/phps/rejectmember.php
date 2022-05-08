<?php 
    require_once 'connect.php';
    HEADER("content-type:application/json");
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_SESSION['username'];
    
        $user = "SELECT * FROM user WHERE username = ?";
        $userdata=$pdo->prepare($user);
        $userdata->execute([$username]);
        $users = $userdata->fetch();
        
        $getTeam = "SELECT * FROM team WHERE id_owner=?";
        $teamData = $pdo->prepare($getTeam);
        $teamData->execute([$users['id_user']]);
        $teams = $teamData->fetch();

        $getReq = "SELECT * FROM request WHERE id_owner = ?";
        $reqData = $pdo->prepare($getReq);
        $reqData->execute([$users['id_user']]);
        $req = $reqData->fetch();
        
        if (empty($username)) {
            header("Location:../phps/team.php?SignIn/Register Required");
            $result['error'] = 'Team Code Must Have Value!';
        } 
        else {
            if($users['id_user'] == $req['id_owner'])  {
                $del = "DELETE FROM request WHERE id_user_request = ? AND id_owner=?";
                $stmt2 = $pdo->prepare($del);
                $stmt2->execute([$req['id_user_request'],$users['id_user']]);
                header("Location:../team.php?Accepted");
            }else {
                header("Location:../team.php?NotOwner");
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
?>