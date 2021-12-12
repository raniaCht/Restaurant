<!DOCTYPE html>
<html lang="en">
<head>
	<title>confirmed reservation</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="cssCons/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="cssCons/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/animate/animate.css">
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="cssCons/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="cssCons/css/util.css">
	<link rel="stylesheet" type="text/css" href="cssCons/css/main.css">
<style type="text/css">
	.numT {
		width: 30%;
		display: inline-block;
		margin-top: 30px;
		margin-left: 3em;
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		align-content: center;
	}
	.res {
		color: #701013;
	}
	.numT.tit {
		font-weight: bold;
		color: #000;
	}
	.show {
		align-content: center;
	}
	p{
		size: 20px;
		font-size: 20px;
		margin-left: 5em;
	}
	.msg {
		margin-top: 30px;
		margin-left: 2em;
		margin-right: 2em;
		font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		align-content: center;
		color: red;
	}
</style>
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background-image: url('cssCons/images/bg-01.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<div class="login100-form validate-form p-b-33 p-t-5 show">
					<?php if($_GET['msgsucc'] == "ok"){ ?>

					<div>
						<p class="numT tit">Table Number</p>
						<p class="numT res"><?php echo $_GET['p']; ?></p>
					</div>
					
					<div>
						<p class="numT tit">date of reservation</p>
						<p class="numT res"><?php echo $_GET['date']; ?></p>
					</div>

					<div>
						<p class="numT tit">booking time</p>
						<p class="numT res"><?php echo $_GET['time']; ?></p>
					</div>

					<div>
						<p class="numT tit">number of persons</p>
						<p class="numT res"><?php echo $_GET['nbrPlace']; ?></p>
					</div>

					<div>
						<p class="numT tit">type of table</p>
						<p class="numT res"><?php echo $_GET['typeTable']; ?></p>
					</div>
					<?php }if ($_GET['msgechec'] == "ok") { ?>
						<p class="msg">sorry, there is not an empty table in this date and this time</p>
					<?php } ?>
					<div class="container-login100-form-btn m-t-32">
						<form action="../controle/deconnexion.php" method="post">
							<button class="login100-form-btn">
							Logout
						</button>
						</form>
						<!-- onclick="self.close()" -->
					</div>

				</div>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="cssCons/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/vendor/bootstrap/js/popper.js"></script>
	<script src="cssCons/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/vendor/daterangepicker/moment.min.js"></script>
	<script src="cssCons/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="cssCons/js/main.js"></script>

</body>
</html>