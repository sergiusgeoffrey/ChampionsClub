<?php 
require_once 'connect.php';
HEADER("content-type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    if (isset($_POST["league"]))
    {
        $league = $_POST["league"];
    }
    $username = $_SESSION["username"];
    $game = $_POST["game"];

    $getUser = "SELECT * FROM user WHERE username = ?";
    $userdata=$pdo->prepare($getUser);
    $userdata->execute([$username]);
    $users = $userdata->fetch();

    $getTeam = "SELECT * FROM team WHERE id_owner=?";
    $teamdata = $pdo->prepare($getTeam);
    $teamdata->execute([$users['id_user']]);
    $teams = $teamdata->fetch();

    $getLeague = "SELECT * FROM tournament WHERE league =?";
    $leaguedata = $pdo->prepare($getLeague);
    $leaguedata->execute([$league]);
    $leagues = $leaguedata->fetch();

    if(empty($username)){
        header("Location:../league.php?NotSignedIN");
    } else {
    if($users['id_user']!=0){
        if($users['id_user']==$teams['id_owner']){
            $sql = "INSERT INTO register_tournament VALUES (default,?,?,?,?,?)";
            $regdata = $pdo->prepare($sql);
            $regdata->execute([$game,$users['id_team'],$leagues['id_tournament'],$leagues['tanggal'],$leagues['waktu']]);
            header("Location:../league.php?Success");
        }
        else {
            header("Location:../league.php?NotALeader");
        }
    } else {
        header("Location:../league.php?NoTeam");
    }
    }

}
?>