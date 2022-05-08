<?php 
error_reporting(0);
require_once 'phps/connect.php'; 
$_SESSION['page'] = 'team';
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CHAMPIONS CLUB</title>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#teams').DataTable();
            });
        </script>
        <style type="text/css">
            .btn-success, .btn-success:visited, .btn-success:active {
                background-color: #f5a302 !important;
                border-color: #f5a302 !important;
            }
            .btn-success:focus, .btn-success:hover {
                background-color: #b57900 !important;
                border-color: #b57900 !important;
                outline: none;
                box-shadow: none !important;
                
            }
            body {
                letter-spacing: 3px;
            }
            html {
                overflow-y:scroll;
                overflow-x:auto;
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
		    }
            html::-webkit-scrollbar {
                display:none;
            }
            #join-button, #create-button {
                font-family: 'Marske';
                color: black;
                font-size: 16pt;
            }
            #submit {
                background-color: #f5a302;
                border-color: #f5a302;
                font-family:'Marske';
                letter-spacing:10px;
                font-weight: normal !important;
            }
            .form-control-file {
                background-color:#292d33;
            }
            table {
                text-align: center;
                width: 100%;
            }
            .modal-footer {
                border-top: 2px rgba(0, 0, 0, 0.5);
            }
            .modal {    
                font-family: default;
            }
            #teams {
                margin-left: auto;
                margin-right: auto;
            }
            #teams_wrapper {
                background-color: rgba(0, 0, 0, 0.5);
                text-align: center;
                align-items: center;
                padding:2rem 2rem 2rem 2rem;
            }
            .hidescroll::-webkit-scrollbar {
                display: none;
            }
            .hidescroll {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }
            img {
                max-width:420px;
            }
            .head {
                font-family:'Marske';
                color:#f5a302;
                letter-spacing:10px;
                text-align:center;
                margin-top:4rem;    
                padding: 5rem 0 5rem 0;
                background-color:#1e2329;
            }
            .row {
                padding: 5rem 0 5rem 0;
                margin-right:0;
                margin-left:0;   
                background-color:rgba(0, 0, 0, 0.5);
            }
            /* footer */
            .featurette-divider {
                margin-top: 5rem;
                margin-bottom: 5rem;
                border: 1px solid white;
            }
            svg {
            max-width: 24px;
            }
            path[Attributes Style] {
                fill-rule: evenodd;
                clip-rule: evenodd;
                d: path("M 11.74 8.99 l 0.039 0.649 l -0.65 -0.08 c -2.367 -0.304 -4.435 -1.337 -6.191 -3.071 l -0.858 -0.86 l -0.222 0.635 c -0.468 1.416 -0.169 2.913 0.807 3.919 c 0.52 0.556 0.403 0.635 -0.494 0.304 c -0.313 -0.106 -0.586 -0.185 -0.612 -0.145 c -0.09 0.093 0.221 1.297 0.468 1.774 c 0.339 0.662 1.028 1.31 1.782 1.695 l 0.638 0.304 l -0.755 0.014 c -0.728 0 -0.754 0.013 -0.676 0.29 c 0.26 0.862 1.288 1.775 2.432 2.172 l 0.806 0.278 l -0.702 0.424 a 7.275 7.275 0 0 1 -3.486 0.98 c -0.585 0.013 -1.066 0.066 -1.066 0.106 c 0 0.132 1.587 0.874 2.51 1.165 c 2.77 0.86 6.06 0.49 8.532 -0.98 c 1.756 -1.046 3.512 -3.125 4.331 -5.137 c 0.442 -1.073 0.884 -3.032 0.884 -3.972 c 0 -0.61 0.04 -0.689 0.768 -1.417 c 0.429 -0.424 0.832 -0.887 0.91 -1.02 c 0.13 -0.251 0.117 -0.251 -0.546 -0.026 c -1.105 0.397 -1.262 0.344 -0.715 -0.252 c 0.403 -0.423 0.884 -1.191 0.884 -1.416 c 0 -0.04 -0.195 0.026 -0.416 0.145 c -0.234 0.133 -0.754 0.331 -1.145 0.45 l -0.702 0.225 l -0.637 -0.436 c -0.351 -0.239 -0.846 -0.504 -1.106 -0.583 c -0.663 -0.185 -1.678 -0.159 -2.276 0.053 c -1.626 0.596 -2.653 2.132 -2.536 3.813 Z");
                fill: currentcolor;
            }
            .ico {
                display :inline-flex;
                align-items:center;
            }
            .sv {
                width:24px;
                height:24px;
                display:flex;
            }
            .icon {
                margin-right: 16px;
            }
            .iclass {
                height: 100%;
                width: 100%;
                -webkit-box-align: center;
                align-items: center;
                flex-direction: row;
                -webkit-box-pack: center;
                justify-content: center;
            }
            .aclass {
                transition: all 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
                text-decoration: none;
                color: rgb(160, 160, 160);
            }
            .aclass:hover {
                color: white;
            }

            @media only screen and (max-width: 768px) {
                img {
                    max-width:280px;
                } 
                #create-c {
                    padding-bottom: 2rem;
                }
            }
            #img1, #img2 {
                padding:0 2rem 0 2rem;
                position:relative;
            }
            .text-centered {
                position: absolute;
                top: 45%;
                left: 0;
                width: 100%;
            }
            #request, #close, #req, #signin-first {
                font-family: 'Marske';
                color: black !important;
                letter-spacing: 2px;
                font-weight: bold !important;
            }
            h2 {
                font-weight: bold;
                letter-spacing: 10px;
                font-size: 28pt;
                color: #f5a302 !important;
            }
            .dataTables_wrapper .dataTables_length, .dataTables_wrapper .dataTables_filter, .dataTables_wrapper .dataTables_info, .dataTables_wrapper .dataTables_processing, .dataTables_wrapper .dataTables_paginate {
                color:white;
            }
            .dataTables_wrapper .dataTables_filter input {
                color:white;
            }
            table.dataTable tbody th, table.dataTable tbody td {
                background-color:black;
            }
            .dataTables_wrapper .dataTables_length select {
                color:white;
            }
        </style>
    <script> 
	$(document).ready(function(){
        $('#img1').hover(function(){
            $('#img2').css("transition",".5s ease");
            $('#img1').css("border-color","#f5a302");
            $('#img2').css("opacity",".5");
        },function(){
            $('#img2').css("transition",".5s ease");
            $('#img1').css("border-color","transparent");
            $('#img2').css("opacity","1");
        });
		$('#img2').hover(function(){
            $('#img1').css("transition",".5s ease");
            $('#img2').css("border-color","#f5a302");
            $('#img1').css("opacity",".5");
        },function(){
            $('#img1').css("transition",".5s ease");
            $('#img2').css("border-color","transparent");
            $('#img1').css("opacity","1");
        });
	})
	</script>

    </head>
    <body class="hidescroll">
   
        <div class="container-fluid">
                <?php if(isset($_SESSION['username']) && empty($users['id_team'])) { ?>
                    <div class="head">
                        <h1>BUILD YOUR TEAM</h1>
                    </div>
            <table class="center">
                <tr>
                    <td>
                    <div class="row" align="center">
                        <div class="col" id="create-c" align="center">
                            <div id="img1" class="d-inline-block">
                                <a id="create-button" type="button" data-toggle="modal" data-target="#myModal" style="text-decoration:none;color:white;">
                                <img src="assets/img/create-team.png">
                                <div class="text-centered" style="font-size:20pt;">CREATE TEAM</div>
                                </a>
                            </div>
                        </div>
                        <div class="col" id="join-c" align="center">
                            <div id="img2" class="d-inline-block">
                                <a id="join-button" type="button" data-toggle="modal" data-target="#myModal2" style="text-decoration:none;color:white;">
                                <img src="assets/img/join-team.png">
                                <div class="text-centered" style="font-size:20pt;">JOIN TEAM</div>
                                </a>
                            </div>
                        </div>
                    </div>
                        <!-- <button id="create-button" type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal"> <b> CREATE TEAM </b></button> -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" style="font-family:Marske;">CREATE YOUR TEAM</h4>
	    		                            <a style="cursor:pointer;" data-dismiss="modal">&#x2715</a>
                                        </div>
                                    <div class="modal-body">
                                        <form action="../CC/upload.php" method="POST" enctype = "multipart/form-data">
                                            <div class="form-group">
                                                <label for="teamname" style="color: #f5a302">TEAM NAME</label>
                                                <input type="text" class="form-control" name="teamname" id="teamname" placeholder="Team Name">
                                                <div id="validTeamname"></div>
                                            </div>
                                            <div class="form-group" style="padding-top: 5%">
                                                    <label for="image" style="color: #f5a302; display: block">TEAM LOGO</label>
                                                    <input type="file" id="image" class="form-control-file" name="image">
                                            </div>
                                            <div class="modal-footer">
                                                <button  id="submit" type ="submit" class="btn btn-success btn-block" > <b> SUBMIT </b></button>
                                                <div id="statusResponse"></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div class="modal fade" id="myModal2" role="dialog" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title" style="font-family:Marske;">JOIN A TEAM</h4>
	    		                        <a style="cursor:pointer;" data-dismiss="modal">&#x2715</a>
                                    </div>
                                    <div class="modal-body">
                                    <form action="../CC/phps/requesttojoin.php" method="POST">
                                        <div class="form-group">
                                            <label for="teamcode" style="color: #f5a302; display: block">TEAM CODE</label>
                                            <input type="text" class="form-control" name="teamcode" id="teamcode" placeholder="TEAM CODE">
                                        </div> 
                                    </div>
                                    <div class="modal-footer">
                                    <button  id="requesttojoin" type ="submit" class="btn btn-success btn-block" > <b> SUBMIT </b></button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
                <?php } ?>
            <div class="center">
                    <div class="head">
                        <h1>FIND TEAM</h1>
                    </div>
                <table id="teams" class="table table-bordered">
                    <thead>
                        <tr style="color: #f5a302">
                            <td >#</td>
                            <td> Team Name </td>
                            <td> Member </td>
                            <td> Team Code</td>
                        </tr>
                    </thead>
                    <tbody id="teams-list">
                        <?php
                            $number=1;
                            $sql = " SELECT * FROM team";
                            $teamID = $pdo->prepare($sql);
                            $teamID->execute();
                            while($data = $teamID->fetch()) {
                                $getteam = "SELECT * FROM team WHERE id_owner=?";
                                $stmt = $pdo->prepare($getteam);
                                $stmt->execute([$data['id_owner']]);
                                $res = $stmt->fetch();
                        ?>
                        <tr  style="color: #f5a302">
                            <td scope="row"> <?php echo $number;?> </td>
                            <td scope="row"> <?php echo $res["nama_team"]; ?> </td>
                            <td scope="row"> <?php echo $res["jumlah_anggota"]; ?> </td>
                            <td scope="row">
                            <?php if (isset ($_SESSION['username'])) 
	    		            { ?>
                                <?php echo $res['id_team'] ?>
                            <?php } else { ?>
                                <button id="signin-first" class="btn btn-dark" disabled style="color: white !important"><b> SIGN IN OR REGISTER FIRST! </b></button>
                            <?php } ?>
                            </td>
                        </tr>
                        <?php $number += 1;
                            } 
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?php 
    $username = $_SESSION['username'];
    $number = 1;

    if(!empty($username)){
    $user = "SELECT * FROM user WHERE username = ?";
    $userdata=$pdo->prepare($user);
    $userdata->execute([$username]);
    $users = $userdata->fetch();
    
    $getreq = "SELECT * FROM request WHERE id_owner = ?";
    $sql = $pdo->prepare($getreq);
    $sql->execute([$users['id_user']]);
    $teamowner = $sql->fetch();
    
    if(!empty($teamowner['id_owner'])){
    if ($users['id_user'] == $teamowner['id_owner']) { ?>
        <div class="container-fluid">
                    <div class="head">
                        <h1>REQUEST LIST</h1>
                    </div>
            <table class="center" style="background-color:rgba(0, 0, 0, 0.5);">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>User ID</th>
                        <th>Username</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td> <?php echo $number ?></td>
                        <td> <?php echo $teamowner['id_user_request'] ?></td>
                        <td> <?php echo $teamowner['username_request'] ?></td>
                        <form action="../CC/phps/acceptmember.php" method="POST">
                            <td><button id="acc" type="submit" class="btn btn-success"><b> Accept </b></button></td>
                        </form>
                        <form action="../CC/phps/rejectmember.php" method="POST">
                            <td><button id="rej" type="submit" class="btn btn-warning"><b> Reject </b></button></td>
                        </form>
                    </tr>
                </tbody>
            </table>    
        </div>
    <?php } } }?>
    <hr class="featurette-divider">
    <footer class="footer">
        <div class="container-fluid" style="padding-bottom:50px;text-align:center;">
            <span>
                COPYRIGHT ©2020 CHAMPIONS CORP.
                <div class="ico">
                    <div class="icon twitter">
                        <a type="grayWhite" href="https://twitter.com/" target="_blank" rel="noopener noreferrer" class="sv aclass">
                            <i class="sc-dIUggk iclass">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="f_icon_1315a46b">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M11.74 8.99l.039.649-.65-.08c-2.367-.304-4.435-1.337-6.191-3.071l-.858-.86-.222.635c-.468 1.416-.169 2.913.807 3.919.52.556.403.635-.494.304-.313-.106-.586-.185-.612-.145-.09.093.221 1.297.468 1.774.339.662 1.028 1.31 1.782 1.695l.638.304-.755.014c-.728 0-.754.013-.676.29.26.862 1.288 1.775 2.432 2.172l.806.278-.702.424a7.275 7.275 0 0 1-3.486.98c-.585.013-1.066.066-1.066.106 0 .132 1.587.874 2.51 1.165 2.77.86 6.06.49 8.532-.98 1.756-1.046 3.512-3.125 4.331-5.137.442-1.073.884-3.032.884-3.972 0-.61.04-.689.768-1.417.429-.424.832-.887.91-1.02.13-.251.117-.251-.546-.026-1.105.397-1.262.344-.715-.252.403-.423.884-1.191.884-1.416 0-.04-.195.026-.416.145-.234.133-.754.331-1.145.45l-.702.225-.637-.436c-.351-.239-.846-.504-1.106-.583-.663-.185-1.678-.159-2.276.053-1.626.596-2.653 2.132-2.536 3.813z" fill="currentColor"></path>
                                </svg>
                            </i>
                        </a>
                    </div>
                    <div class="icon facebook">
                        <a type="grayWhite" href="https://www.facebook.com/" target="_blank" rel="noopener noreferrer" class="sv aclass">
                            <i class="sc-dIUggk iclass">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="f_icon_eaa8673f">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M13.32 21v-8.501h2.366L16 9.569h-2.68l.004-1.466c0-.764.073-1.173 1.18-1.173h1.48V4h-2.368c-2.843 0-3.844 1.421-3.844 3.811V9.57H8v2.93h1.772V21h3.548z" fill="currentColor"></path>
                                </svg>
                            </i>
                        </a>
                    </div>
                    <div class="icon twitch">
                        <a type="grayWhite" href="https://www.twitch.tv/" target="_blank" rel="noopener noreferrer" class="sv aclass">
                            <i class="sc-dIUggk iclass">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="f_icon_b32e6069">
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M19.326 12.612l-2.93 2.857H11.79l-2.51 2.449v-2.449H5.512V3.633h13.815v8.979zM3.837 2L3 5.265V19.96h3.768V22H8.86l2.094-2.041h3.348L21 13.429V2H3.837z" fill="currentColor"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.113 11.796h1.674V6.897h-1.674v4.899zm4.604 0h1.674V6.897h-1.674v4.899z" fill="currentColor"></path>
                                </svg>
                            </i>
                        </a>
                    </div>
                </div>
            </span>
        </div>
    </footer>
    <script>
        $(document).ready(function(){
            $('#teamname').keyup(function(){
                var teamname = $(this).val().trim();
                if(teamname != '' ){
                    $.ajax({
                        url: '../CC/phps/teamname.php',
                        method: 'POST',
                        data:{teamname: teamname},
                        success: function(response){
                            var check = $('#validTeamname').html(response);
                            if (response == "<span style='color:red'>UNAVAILABLE</span>") {
                                $('#submit').prop('disabled',true);
                            } else {
                                $('#submit').prop('disabled',false);
                            }
                        }
                    })
                }
            });
        });
        $(document).ready(function(){
            $('#submit').keyup(function(){
                var status = $(this).val();
                if(status != 0 ){
                    $.ajax({
                        url: '../CC/phps/checkstatus.php',
                        method: 'POST',
                        data:{status: status},
                        success: function(response){
                            $('#statusResponse').html(response);
                        }
                    })
                }
            });
        });
        $(document).ready(function () {
            $("#theform").submit(function (e) {
                e.preventDefault();
                $("#request").attr("disabled", true);
                return true;
            });
        });
    </script>
    </body>
</html>