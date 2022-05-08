<?php 
require_once './phps/connect.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="Cache-Control" content="no-store"/>

	<meta name="description" content="CHAMPIONS CLUB">
	<meta name="author" content="">
	<!-- <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico" /> -->

	<title>CHAMPIONS CLUB</title>
	
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	
	<!-- lib -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	
	<!-- datatables -->
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
	<!-- GSAP -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js" integrity="sha512-IQLehpLoVS4fNzl7IfH8Iowfm5+RiMGtHykgZJl9AWMgqx0AmJ6cRWcB+GaGVtIsnC4voMfm8f2vwtY+6oPjpQ==" crossorigin="anonymous"></script>

	<?php //include "resession.php" ?>

	<script type="text/javascript">
	$.fn.modal.Constructor.prototype._enforceFocus = function() {}
		$(document).ready(function(){
			setInterval(function(){
				var refresh = 1;
				$.ajax({
					//url:"resession.php",
					type : "POST",
					data : { 
						refresh:refresh 
					},
					success:function(res){
						console.log(res);
					}
				})
			},3000);
		})
	</script>

	<style>
		@font-face {
			font-family: 'Stellar'
			src: url("../assets/fonts/Stellar-light.otf");
		}
		@font-face {
			font-family: 'Marske'
			src: url("../assets/fonts/Marske.ttf");
		}
		.navbar {
			background :#2a2f35;
			font-size:large;
			list-style-type:none;
			letter-spacing : 3px;
			top:0;

		}
		.navbar-collapse {
			align-items:unset !important;
		}
		.navbar-toggler-icon {
			background-image: url('../CC/assets/img/logop.png') !important;
		}
		.navbar-dark .navbar-toggler {
			border-color:transparent !important;
		}
		
		.border-bottom {
			border-bottom: 1px solid #f5a302 !important;
		}
		body {	
           	/* margin : 15px 15px 15px 15px; */
            font-family:'Stellar';
            letter-spacing:10px;
            color:white;
            background-image: url("assets/img/background.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

		#logo:hover {
			background :#23272c;
		}
		.btn {
			border-radius: 0 !important;
		}
		.form-control {
			border-radius: 0 !important;
			background-color:#2a2f35;
			border-color:white;
			color:white;
		}
		
		#signin-button {
			background-color:#f5a302;
			border-color:#f5a302;
			font-family:'Marske';
			letter-spacing:10px;
			font-weight:normal !important;
		}
		.modal {
			align-items:center;
			text-align:center;
			top:25%;
			letter-spacing:3px !important;
			}
		.modal-header {
			padding-left:3rem;
			padding-right:3rem;
			background-color:#292d33;
			border: none !important;
		}
		.modal-body {
			padding-left:3rem;
			padding-right:3rem;
			text-align:left;
			border: none !important;
		}
		.modal-footer {
			padding-left:3rem;
			padding-right:3rem;
			border: none !important;
		}
		.modal-content {
			background-color:#2a2f35;
			color:White;
			border: none;
			border-radius: 2px;
			box-shadow: 0 16px 28px 0 rgba(0,0,0,0.22),0 25px 55px 0 rgba(0,0,0,0.21);
		}

		@media only screen and (max-width: 992px) {
			#logo {
				display:none;
			}
		}
		@media only screen and (min-width: 992px) {
			.navbar {
				padding-bottom: 0px !important;
				padding-top: 0px !important;
			}	
			.navbar-expand-lg .navbar-nav .nav-link {
				padding-top:12px;
				padding-left: 22px;
				padding-right: 22px;
			}
			
		}

		


	</style>
</head>
<body>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" >
        <div class="modal-header">
			<h4 class="modal-title" style="font-family:Marske;">SIGN IN</h4>
			<a style="cursor:pointer;" data-dismiss="modal">&#x2715</a>
		</div>
		<div class="modal-body">
			<div class="form-group">
				<label for="username" style="color: #f5a302">USERNAME</label>
				<input type="text" class="form-control" name="username" id="username" placeholder="USERNAME">
			</div>
			<div class="form-group">
				<label for="password" style="color: #f5a302">PASSWORD</label>
				<input type="password" class="form-control" name="password" id="password" placeholder="PASSWORD">
			</div>			
		</div>
		<div class="modal-footer">
			<button id="signin-button" class="btn btn-success btn-block"> <b> SIGN IN </b> </button>
		</div>
    </div>
  </div>
</div>
	

	<nav class="navbar navbar-expand-lg fixed-top navbar-dark">
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarToggler">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item"id="logo">
					<img src="assets\img\logo.png" width ="64" height="64" alt="loading="lazy"">
				</li>
				<?php if ($_SESSION['page'] == 'home') {
					echo '<li class="nav-item active border-bottom">
					<a class="nav-link" href="home.php">HOME</a>
					</li>';
				}
				else{
					echo '<li class="nav-item">
					<a class="nav-link" href="home.php">HOME</a>
					</li>';
				}
				?>
				<?php if ($_SESSION['page'] == 'team') {
					echo '<li class="nav-item active border-bottom">
					<a class="nav-link" href="team.php">TEAM</a>
					</li>';
				}
				else{
					echo'<li class="nav-item" id = "team">
					<a class="nav-link" href="team.php">TEAM</a>
					</li>';
				}
				?>
				<?php if ($_SESSION['page'] == 'league') {
					echo '<li class="nav-item active border-bottom">
					<a class="nav-link" href="league.php">TOURNAMENTS</a>
					</li>';
				}
				else{
					echo'<li class="nav-item">
					<a class="nav-link" href="league.php">TOURNAMENTS</a>
					</li>';
				}
				?>
			</ul>
			<ul class="navbar-nav ml-auto">
			<?php if (isset ($_SESSION['username'])) 
			{?>
				<li class="nav-item dropdown" id="profile">	
				<a class="nav-link" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $_SESSION['username']?></a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="profile.php">PROFILE</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="./phps/logout.php">LOG OUT</a>
				</div>
				</li>
			<?php } else {?>
				<li class="nav-item" id="signin">
					<!-- <a class="nav-link" href="signin.php">SIGN IN</a> -->

					<a class="nav-link" id="input-modal" data-target="#exampleModal" role="button" data-toggle="modal">
						SIGN IN</a>
			
				</li> <?php if ($_SESSION['page'] == 'register') {?>
				<li class="nav-item active border-bottom" id="register">
					<a class="nav-link" href="register.php">REGISTER</a>
				</li>
				<?php } else { ?>
					<li class="nav-item" id="register">
					<a class="nav-link" href="register.php">REGISTER</a>
				</li>
				 <?php } ?>
			<?php } ?>

			</ul>
		</div>
	</nav>
		


	
	<script>
        $("#signin-button").click(function(){
            var username = $("#username").val();
            var password = $("#password").val();

            $.ajax({
                url: '../CC/phps/login.php',
                method: 'POST',
                data: {
                    username: username,
                    password: password
                },
                success: function(data) {
                    window.location = data['redirect'];
                },
                error: function(x, y, z) {
                    // alert($xyz.error['error']);
                    console.log(x,y,z);
                }
            });
        });
    </script>

	<!-- regis -->
	<script>
        function visible() {
        var a = document.getElementById("password");
        if (a.type === "password") {
        a.type = "text";
        } else {
        a.type = "password";
        }
        };
        $(document).ready(function(){
            $('#username').keyup(function(){
                var username = $(this).val().trim();
                if(username != '' ){
                    $.ajax({
                        url: '../CC/phps/usernamecheck.php',
                        method: 'POST',
                        data:{username: username},
                        success: function(response){
                            $('#validUsername').html(response);
                            if (response == "<span style='color:red'>UNAVAILABLE</span>") {
                                $('#regis-button').prop('disabled',true);
                            } else {
                                $('#regis-button').prop('disabled',false);
                            }
                        }
                    })
                }
            });
        });

    </script>



</body>
</html>