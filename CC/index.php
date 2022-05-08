<?php 
require './phps/connect.php'; 
$_SESSION['page'] = 'home';
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style type="text/css">

        /* font */
        @font-face {
			font-family: 'Stellar'
			src: url('../CC/assets/fonts/Stellar-light.otf');
		}
		@font-face {
			font-family: 'Marske'
			src: url('../CC/assets/fonts/Marske.ttf');
		}

        /* scroll hidden */
		html {
			overflow-y:scroll;
			overflow-x:hidden;
            -ms-overflow-style: none;  /* IE and Edge */
            scrollbar-width: none;  /* Firefox */
		}
        html::-webkit-scrollbar {
            display:none;
        }

        /* background img */
        body {
           	/* margin : 15px 15px 15px 15px; */
            font-family:'Stellar';
            letter-spacing:10px;
            color: white;
            background-image: url("assets/img/background.jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        .wrapper {
            margin : 100px 20px 125px 20px;   
        }
        .main {
            font-family: 'Marske';
            color: #f5a302;
        }
        .container {
            text-align:center;
            height: 640px;
            position:relative;
            margin-top: 100px;
        }
        #game {
            padding-top: 5rem;
            background-color: #1e2329;
            /* background-color: black; */
        }
        #about {
            padding-top:15rem;
        }
        #game:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -30px;
            background: url('../CC/assets/img/razor-top.svg') repeat-x top;
            height: 40px;
            filter: invert(8%) sepia(8%) saturate(1919%) hue-rotate(172deg) brightness(89%) contrast(86%);
        }
        #about:after {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            background: url('../CC/assets/img/razor-bottom.svg') repeat-x top;
            height: 40px;
            filter: invert(8%) sepia(8%) saturate(1919%) hue-rotate(172deg) brightness(89%) contrast(86%);
        }
        .col {
            transition: transform .2s;
            margin-bottom: 100px;
        }
        .text-centered {
            font-size:20pt;
        }
        .row {
            display:inline-flex !important;
        }
        .featurette-divider {
            margin-top: 5rem;
            margin-bottom: 5rem;
            border: 1px solid white;
        }
        #text-w {
            letter-spacing:3px !important;
        }
        #img1, #img2 {
            border: 8px solid transparent;
            padding: 10px;
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
        #interest-1 {
            border-radius: 0 !important;
            padding:1rem 2rem 1rem 2rem;
            font-size:25pt;
        }
        #interest-2 {
            border-radius: 0 !important;
            padding:1.4rem 3rem 1.5rem 3rem;
            font-size:35pt;
        }
        @media only screen and (max-width: 576px) {
            #game {
                margin-top:10rem !important;
            }
            #CC {
                font-size : 55pt !important;
            }
            h2 {
                font-size : 20pt !important;
            }
            h4 {
                font-size: 15pt !important;
            }
            #interest-1 {
                padding:1rem 2rem 1rem 2rem;
                font-size:15pt;
            }
            #interest-2 {
                padding:1.4rem 3rem 1.5rem 3rem;
                font-size:20pt;
            }
        }
        @media only screen and (max-width: 768px) {
            .wrapper {
            margin : 100px 25px 25px 25px;   
            }
            body {
                background-size: auto;
            }
            .container .row {
                display:inline-block;
            }
            .container {
                max-width: 600px;
            }
            .container img {
                height:200px;
            }
            #CC {
                font-size : 60pt;
            }
            #explain-title {
                font-size : 35pt;
            }
            .main {
                padding-left:8px;
            }
            #about {
                padding-top:10rem;
            }
            #text-w {
                padding-bottom:15px;
            }
            #game {
                margin-top:14rem;
            }
            #interest-1 {
                padding:1rem 2rem 1rem 2rem;
                font-size:20pt;
            }
            #interest-2 {
                padding:1.4rem 3rem 1.5rem 3rem;
                font-size:25pt;
            }
        }
        @media only screen and (min-width: 768px) and (max-width: 992px) {
            .container img {
                height:300px;
            }
            .container {
                max-width: 990px;
            }
            #CC {
                font-size : 75pt;
            }
            #explain-title {
                font-size : 50pt;
            }
            #about {
                padding-left:40px;
                padding-right:40px;
                
            }
            .wrapper {
                padding-bottom:80px;
            }
        }
        @media (min-width: 992px) {
            .container {
                max-width: 1800px;
                margin: auto;
            }
            #about {
                padding-left:140px;
                padding-right:140px;
            }
            .col {
                max-width:400px;
            }
            .container img {
                width:300px;
                height:400px;
            }
            #CC {
                font-size : 90pt;
            }
            #explain-title {
                font-size : 75pt;
            }
            .wrapper {
                padding-bottom:100px;
            }

        }
        
    </style>
    <script> 
	$(document).ready(function(){
        $('#csgo').hover(function(){
            $('#dota').css("transition",".5s ease");
            $('#img1').css("border-color","#f5a302");
            $('#dota').css("opacity",".5");
        },function(){
            $('#dota').css("transition",".5s ease");
            $('#img1').css("border-color","transparent");
            $('#dota').css("opacity","1");
        });
		$('#dota').hover(function(){
            $('#csgo').css("transition",".5s ease");
            $('#img2').css("border-color","#f5a302");
            $('#csgo').css("opacity",".5");
        },function(){
            $('#csgo').css("transition",".5s ease");
            $('#img2').css("border-color","transparent");
            $('#csgo').css("opacity","1");
        });
	})
	</script>
</head>
<body>

    <div class="container">
    
    <div class="wrapper">
        <div id="title" class="main">
            <h2>WELCOME TO THE</h2>
            <h1 id="CC">CHAMPIONS CLUB</h1>
            <h4>COMPETITIVE GAMING PLATFORM</h4>
        </div>
        <?php if (!isset ($_SESSION['username'])) 
        { ?>
            <h3 class="lead" id="text-w" style="padding-top:80px;">GOOD LUCK, HAVE FUN. JOIN NOW</h3>
            <form action="register.php" style="padding-top:50px;">
                <button class="btn btn-warning" id="interest-1" type="submit" >CREATE AN ACCOUNT</button>
            </form>
        <?php } else { ?>
            <form action="league.php" style="padding-top:140px;">
                <button class="btn btn-warning" id="interest-2" type="submit" >PLAY RIGHT NOW</button>
            </form>
        <?php } ?>
    </div>
        <div class="container" id="game">
            <h1 class="main" style="padding-bottom:20px;">SUPPORTED GAMES</h1>
            <div style="background:#181c21;margin-left:-15px;margin-right:-15px;padding-top:80px;">
                <div class="row">
                    <div class="col" id="csgo">
                        <div id="img1" class="d-inline-block">
                            <a href="https://blog.counter-strike.net/" style="text-decoration:none;color:white;">
                            <img src="assets/img/csgo.png">
                            </a>
                        </div>
                            <div class="text-centered">CSGO</div>
                    </div>
                    <div class="col" id="dota">
                        <div id="img2" class="d-inline-block">
                            <a href="https://blog.dota2.com/" style="text-decoration:none;color:white;">
                            <img src="assets/img/dota.png">
                            </a>
                        </div>
                            <div class="text-centered">DOTA 2</div>
                    </div>
                </div>
            </div>
        </div>
    <div class="container-fluid" id="about" style="background-color:#1e2329;">
        <div class="row featurette" >
            <div class="col-md-7 order-md-2">
                <h1 class="main" id="explain-title">COMPETE ANYWHERE, ANYTIME</h1>
                <h3 class="lead" id="text-w">Match against skillfull players around the world, win competitions, earn prices. </h3>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="assets/img/ex1.png" data-holder-rendered="true" style="width: 400px; height: 450px;">
            </div>
        </div>
        <div style="padding-bottom:150px;"></div>
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h1 class="main" id="explain-title">BUILD YOUR OWN DREAM TEAM</h1>
                <h3 class="lead" id="text-w">Create and join team with your friends, customize on your own.</h3>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="assets/img/ex2.png" data-holder-rendered="true" style="width: 400px; height: 450px;">
            </div>
        </div>
        <div style="padding-bottom:150px;"></div>
        <div class="row featurette">
            <div class="col-md-7 order-md-2">
                <h1 class="main" id="explain-title">MAKE YOUR WAY TO THE TOP</h1>
                <h3 class="lead" id="text-w">Complete and win leagues, tournaments to win prizes ranging from skins and chest to gaming gears.</h3>
            </div>
            <div class="col-md-5 order-md-1">
                <img class="featurette-image img-fluid mx-auto" data-src="holder.js/500x500/auto" alt="500x500" src="assets/img/ex3.png" data-holder-rendered="true" style="width: 400px; height: 450px;">
            </div>
        </div>
        <div style="padding-bottom:150px;"></div>
    </div>
    <hr class="featurette-divider">
    <footer class="footer">
        <div class="container-fluid" style="padding-bottom:50px;">
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
    </div>

</body>
</html>

