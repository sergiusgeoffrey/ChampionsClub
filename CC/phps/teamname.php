<?php
require_once 'connect.php';
if(isset($_POST['teamname'])){

    $teamname = $_POST['teamname'];
    $stmt=$pdo->prepare("SELECT count(*) as countTeam FROM team WHERE nama_team=:nama_team");
    $stmt->bindValue(':nama_team',$teamname,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    $check = 0;
    $response ="<span style='color:green'>AVAILABLE</span>";
    if($count>0){
        $response="<span style='color:red'>UNAVAILABLE</span>";
        $check = 1;
    }
    echo $response;
    
    exit;
}
?>