<?php
require_once 'connect.php';
HEADER("content-type:application/json");

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = array(
            "status" => 1,
            "error" => "",
            'redirect' => ""
        );

        if ($username == '' || $password == '') {
            header("HTTP/1.1 400 Bad Request");
            $result['status'] = 0;
            $result['error'] = 'Username & Password Must Have Value!';
        }

        $sql = "SELECT * FROM user WHERE username = ? AND password =  ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$username, $password]);

        $row_count = $stmt->rowCount();
        
        if ($row_count >= 1) {
            $_SESSION['username'] = $username;
            $result['redirect'] = '/ProjekTekweb/CC/index.php';
            $user = $stmt->fetch();
        } else {
            header("HTTP/1.1 400 Bad Request");
            $result['status'] = 0;
            $result['error'] = 'Wrong Username or Password';
        }
        echo json_encode($result);
    }
?>