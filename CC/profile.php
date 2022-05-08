<?php
error_reporting(0);
require_once './phps/connect.php'; 
$_SESSION['page'] = 'profile';
if (!isset($_SESSION['username'])) {
    header("Location: ../CC/index.php");
}else {
    include 'header.php';
}
?>

<body>
<script>
    $("#show-password").click(function(){
        
    });
</script>
    <style type="text/css">
        body {
            letter-spacing:3px;
            font-family:'Stellar';
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background-color:#292d33;
        }
        .profile-img{
            text-align: center;
        }
        .profile-head {
            font-family:'Marske';
            color:#f9a102;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background-color:#292d33;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
    </style>
    <div class="container emp-profile" style="margin-top:10rem;">
                        <?php 
                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                            $username = $_SESSION['username'];
                            $sql = "SELECT * FROM user WHERE username = ?";
                            $stmt = $pdo->prepare($sql);
                            $stmt->execute([$username]);
                            $row = $stmt->fetch();

                            $getTeam = "SELECT * FROM team WHERE id_team=?";
                            $teamData = $pdo->prepare($getTeam);
                            $teamData->execute([$row["id_team"]]);
                            $teams = $teamData->fetch();
                            
                            if($teams['id_team']==$row['id_team']) {
                                $namateam= $teams['nama_team'];
                            }
                            ?>
            <div class="row" style="font-family:'Marske';color:#f5a302;padding:10px 20px 10px 20px; background-color:#1e2329;">
                <h2>USER PROFILE</h2>
            </div>
                <div class="row" style="background-color:#1e2329;">
                    <div class="col-md-4" style="padding-bottom:2rem;">
                        <div class="profile-img">
                            <img src="
                            <?php if(isset($teams['logo'])) {
                                echo $teams['logo'];
                            } else {
                                echo "./assets/img/pp-stock.jpg";
                            }?>" alt="PROFILE PICTURE" style="width:180px;height:180px;">
                        </div>
                    </div>
                    <div class="col-md-6" style="padding-bottom:20px;">
                        <div class="profile-head">
                            <label>USERNAME</label>
                                    <h2><?= $row["username"]?></h2>
                            <label>EMAIL</label>
                                    <h3><?= $row["email"]?></h3>
                            <label>TEAM NAME</label>
                                    <?php if(!empty($namateam)) {?>
                                    <h3><?= $namateam?> </h3>
                                    <?php } else {?>
                                        <h3 style="color:red;">NO TEAM</h3>
                                    <?php }?>
                    </div>
                </div>
                    <div class="container" style="background-color:#2a2f35;padding-top:1rem;">
                        <div class="row">
                                                <div class="col-md-6">
                                                    <label>FULL NAME</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $row["real_name"]?></p>
                                                </div>
                        </div>
                        <div class="row">
                                                <div class="col-md-6">
                                                    <label>EMAIL</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $row["email"]?></p>
                                                </div>
                        </div>
                        <div class="row">
                                                <div class="col-md-6">
                                                    <label>BIRTHDATE</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $row["tanggal_lahir"]?></p>
                                                </div>
                        </div>
                        <div class="row">
                                                <div class="col-md-6">
                                                    <label>GENDER</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <p><?= $row["gender"]?></p>
                                                </div>
                        </div>
                    </div>
                    <?php } 
                    else {
                        header("HTTP/1.1 400 Bad Request");
                        $error = array(
                            'error' => 'Method not Allowed'
                        );

                        echo json_encode($error);
                    }?>
    </div>
</body>
