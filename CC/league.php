<?php 
require './phps/connect.php'; 
$_SESSION['page'] = 'league';
include 'header.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CHAMPIONS CLUB</title>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css" integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA==" crossorigin="anonymous" />
        <script>
        $(document).ready(function() {
            $("#esl_one").click(function() {
                $('.modal-title').text("ESL_ONE");
                $('#submit-party').val('esl_one');
            });
            $("#dream").click(function() {
                $('.modal-title').text("DREAM LEAGUE");
                $('#submit-party').val('dreamleague');
            });
            $("#mango").click(function() {
                $('.modal-title').text("MANGO CUP");
                $('#submit-party').val('mangocup');
            });

        });
        </script>
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
            .sub {
                background-color:#f5a302 !important;
            }
            .btn-warning {
                background-color:#f5a302 !important;
                border:none;
                color:#f5a302;
            }
            .btn-warning:hover {
                background-color:black !important;
                opacity:.7;
                color: #f5a302 !important;
            }
            .btn-success {
                border:none;
            }
            body {
                letter-spacing: 3px;
            }
            #submit-party, #party {
                background-color:#f5a302;
                border-color:#f5a302;
                font-family:'Marske';
            }
            .row, .container {
                font-family:'Marske';
            }
            .party {
                font-size: 24pt;
            }
            .row {
                padding:0 2rem 0 2rem;
            }
            .form-control-file {
                background-color: #292d33;
            }
            .text-centered {
                position: absolute;
                top: 5%;
                left: 0;
                width: 100%;
                font-size:40pt;
            }
            img:hover {
                opacity:.5;
            }

            .featurette-divider {
                margin-top: 5rem;
                margin-bottom: 5rem;
                border: 1px solid white;
            }

            #content:after {
            content: "";
            position: absolute;
            left: 15px;
            right: 15px;
            background: url('../CC/assets/img/razor-bottom.svg') repeat-x top;
            height: 40px;
            filter: invert(8%) sepia(8%) saturate(1919%) hue-rotate(172deg) brightness(89%) contrast(86%);
            }
            .top-w {
                margin-top:8rem;
            }
            .top-w:after {
                content: "";
                position: absolute;
                left: 15px;
                right: 15px;
                background: url('../CC/assets/img/razor-top.svg') repeat-x top;
                height: 40px;
                filter: invert(8%) sepia(8%) saturate(1919%) hue-rotate(172deg) brightness(89%) contrast(86%);
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
            h2 {
                font-size:70pt;
                color:#f5a302;
            }
            h4 {
                font-size:15pt;
                color:#f5a302;
            }
            @media only screen and (max-width: 768px) {
                img {
                    max-width:75%;
                }
                h2 {
                    font-size:50pt;
                }
                .top-w {
                 margin-top:5rem;
                }
                .text-centered {
                    font-size:30pt;
                }
            }
            @media only screen and (min-width: 768px) and (max-width: 992px) {
                img {
                    max-width:85%;
                }
                
            }
        </style>
    </head>
    <body>
    <div class="top-w" style="padding-bottom:38px;"></div>
    <div class="container-fluid">
        <div id="content"style="background-color:#1e2329;">
                <div class="container" style="padding-top:2rem;">
                    <div style="text-align: center;letter-spacing:10px;">
                        <h2>TOURNAMENT</h2>
                        <h4>ONLY TEAM LEADER CAN APPLY</h4>
                    </div>
                </div>
            <div class="container" style="text-align:center;padding-top:2rem;padding-bottom:3rem;background-color:#181c21;">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="d-inline-block">
                                <a id="esl_one" class="btn btn-warning party" type="button" data-toggle="modal" data-target="#myModal" >
                                    <div class="text-centered">ESL_ONE</div>
                                <img src="./assets/img/eslone-neutral.png">
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-inline-block">
                                <a id="dream" class="btn btn-warning party" type="button" data-toggle="modal" data-target="#myModal" >
                                    <div class="text-centered">DREAM LEAGUE</div>
                                <img src="./assets/img/dreamleague-neutral.png">
                                </a>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="d-inline-block">
                                <a id="mango"  class="btn btn-warning party" type="button" data-toggle="modal" data-target="#myModal" >
                                    <div class="text-centered">MANGO CUP</div>
                                <img src="./assets/img/mango-neutral.png">
                                </a>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
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
    </div>
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tournament</h4>
                    <a style="cursor:pointer;" data-dismiss="modal">&#x2715</a>
                </div>
                <form action="../CC/phps/tournament.php" method="POST">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="game" style="color: #f5a302">WHICH GAME DO YOU WANT TO JOIN</label>
                            <select name="game" id="game"style="background-color:#3b4046;color:white;">
                                <option value="1">CS:GO</option>
                                <option value="2">DOTA 2</option>
                            </select>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button name="league" id="submit-party" class="btn btn-success sub"> S U B M I T</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    
    <script>
        $(document).ready(function(){
            
         });
    </script>
    </body>
</html>