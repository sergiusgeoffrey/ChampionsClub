<?php 
require './phps/connect.php'; 
$_SESSION['page'] = 'register';
if (isset($_SESSION['username'])) {
    header("Location: ../CC/index.php");
}
include 'header.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <title>CHAMPIONS CLUB</title>

        <style type="text/css">
            html {
                overflow-y:scroll;
                overflow-x:hidden;
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;  /* Firefox */
            }
            html::-webkit-scrollbar {
                display:none;
            }
            body {
                background-image: url('assets/img/background.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                letter-spacing:3px;
            }
            .btn-success {
                font-family:'Marske';
                letter-spacing:10px;
                background-color: #f5a302 !important;
                border-color: #f5a302 !important;
                border-radius: 0 !important;    
            }
            .btn-success:hover {
                background-color: #b57900 !important;
                border-color: #b57900 !important;
                outline: none;
                box-shadow: none !important;
                
            }
            .back, .back:visited, .back:active {
                color: #f5a302 !important;
            }
            .back:hover, .back:focus {
                color: #b57900 !important;
            }
            .cc {
                font-family: 'Marske';
                color: #f5a302;
            }

            .card {
                margin-top:5rem;
                border: none !important;
            }
            .card-header {
                background-color:#292d33;
            }
            .card-body {
                background-color:#2a2f35;
            }
            #regis-button {
                font-family: 'Marske';
                color: black;
                font-size: 16pt;
            }
        </style>
    </head>
    <body>
    
    <div id="register-modal" style="margin-top:5rem;margin-bottom:2rem;">
        <div class="container" >
            <div class="modal-content">
                <div class="modal-header">
                        <a href="index.php" class="back" style="float: left; margin-right: -20px"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M14 1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                        </svg> </a>
                    <h4 class="modal-title" style="font-family:Marske;">REGISTER</h4>
                </div>
                <div class="modal-body">
                            <form action="../CC/phps/signup.php" method="POST">
                                <div class="form-group">
                                    <label for="username" style="color: #f5a302">USERNAME</label>
                                    <input type="text" class="form-control" name="username-register" id="username-register" placeholder="USERNAME">
                                    <div id="validUsername"></div>
                                </div>
                                <div class="form-group">
                                    <label for="real_name" style="color: #f5a302">FULLNAME</label>
                                    <input type="text" class="form-control" name="real_name" id="real_name" placeholder="FULLNAME">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_lahir" style="color: #f5a302">BIRTHDAY</label>
                                    <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="tanggal_lahir">
                                </div>
                                <div class="form-group">
                                    <label for="gender" style="color: #f5a302">GENDER</label>
                                    <select id="gender" name="gender" style="padding:5px;"> 
                                        <option value="Male">MALE</option>
                                        <option value="Female">FEMALE</option>
                                        <option value="Others">PREFER NOT TO SAY</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="password" style="color: #f5a302">PASSWORD</label>
                                    <input type="password" class="form-control" name="password-register" id="password-register" placeholder="ENTER YOUR PASSWORD">
                                    <input type="checkbox" onclick="visible()"><b style="color: #f5a302;padding-top:5px;padding-left:5px;font-size:9pt;">SHOW PASSWORD</b>
                                </div>
                                <div class="form-group">
                                    <label for="email" style="color: #f5a302">EMAIL</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="EX: dummy@gmail.com">
                                </div>
                                <div class="form-group">
                                    <label for="id_discord" style="color: #f5a302">DISCORD ID</label>
                                    <input type="text" class="form-control" name="id_discord" id="id_discord" placeholder="EX: 3304">
                                </div>
                                <button id="register" class="btn btn-success btn-block regis" disabled  ><b>REGISTER</b> </button>
                            </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function visible() {
        var a = document.getElementById("password-register");
        if (a.type === "password") {
        a.type = "text";
        } else {
        a.type = "password";
        }
        };
        $(document).ready(function(){
            $('#username-register').keyup(function(){
                var username = $(this).val().trim();
                if(username != '' ){
                    $.ajax({
                        url: '../CC/phps/usernamecheck.php',
                        method: 'POST',
                        data:{username: username},
                        success: function(response){
                            $('#validUsername').html(response);
                            if (response == "<span style='color:red'>UNAVAILABLE</span>") {
                                $('.regis').prop("disabled",true);
                                console.log(1);
                            } else {
                                $('.regis').prop("disabled",false);
                            }
                        }
                    })
                }
            });
            
        });
        
    </script>
    </body>
</html>