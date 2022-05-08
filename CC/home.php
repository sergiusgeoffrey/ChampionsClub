<?php 
require 'phps/connect.php'; 
$_SESSION['page'] = 'home';
if (!isset($_SESSION['nrp'])) {
	header("Location: index.php");
}
include 'header.php';
?>
<!DOCTYPE html>
<html>
	<style type="text/css">
		body {
			font-family:'Stellar';
			background: #171314;
			overflow: hidden;
		}
	</style>
	<script> 
		$(document).ready(function(){
			$('.containtext').delay("100");
			$('.containtext').fadeIn("25000");
		})
	</script>
	<body>
		<div class = "containtext" style= "display:none">
			<div class="row">
				home	
			</div>
			
		</div>
	</body>
</html>