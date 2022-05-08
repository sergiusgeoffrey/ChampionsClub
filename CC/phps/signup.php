<?php 
require_once 'connect.php';
HEADER("content-type:application/json");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $result = array(
        "status" => 1,
        "error" => "",
        'redirect' => ""
    );
    $username = $_POST['username-register'];
    $password = $_POST['password-register'];
    $real_name = $_POST['real_name'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $gender=$_POST['gender'];
    $email = $_POST['email'];
    $id_discord = $_POST['id_discord'];

    if ($username == '' || $password == ''||$real_name==''||$tanggal_lahir==''||$gender==''||$email=='') {
        header("HTTP/1.1 400 Bad Request");
        $result['error'] = 'Items Must Have Value!';
        header("Location:../register.php?empty");
    } else {
        $sql = "INSERT INTO user VALUES(default, default, ?, ?, ?, ?, ?, ?, ?,default)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $real_name,$tanggal_lahir,$gender,$email, $password, $id_discord]);
        $result['redirect'] = '/ProjekTekweb/CC/index.php';
        header("Location:../index.php?status=1");
    }
    // $email = $_POST['email'];
    // $username = $_POST['username'];
    // $password = $_POST['password'];
    // $id_discord = $_POST['id_discord'];


    // if ($username == '' || $password == '' || $email == '' || $id_discord == '' ) {
    //     header("HTTP/1.1 400 Bad Request");
    //     $result['error'] = 'Items Must Have Value!';
    // } else {
    //     $sql = "INSERT INTO user VALUES(default, default, ?, ?, ?, ?,default)";
    //     $stmt = $pdo->prepare($sql);
    //     $stmt->execute([$username, $email, $password, $id_discord]);
    //     $result['redirect'] = '/ProjekTekweb/CC/index.php';
    // }
    // echo json_encode($result);
} else {
    header("HTTP/1.1 400 Bad Request");
    $error = array(
        'error' => 'Method not Allowed'
    );

    echo json_encode($error);
}

