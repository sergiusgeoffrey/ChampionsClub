<?php
require_once 'connect.php';
if(isset($_POST['username'])){

    $username = $_POST['username'];
    $stmt=$pdo->prepare("SELECT count(*) as countUser FROM user WHERE username=:username");
    $stmt->bindValue(':username',$username,PDO::PARAM_STR);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    $response ="<span style='color:green'>AVAILABLE</span>";
    if($count>0){
        $response="<span style='color:red'>UNAVAILABLE</span>";
    }
    echo $response;
    exit;
}
?>