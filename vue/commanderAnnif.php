<?php 
session_start();
require '../model/clientImpl.php'; 
$client = new clientImpl();
$plats = $client->consulterMenu();

foreach ($plats as $plat) {
	if($plat['nomP'] == 'cake'){
		$tartes[] = $plat;
	}
}
$types = '';
foreach ($tartes as $tar) {
	$types .= '<option value="'.$tar['type'].'">'.$tar['type'].'</option>';
}

?>


<!DOCTYPE html>
<html>
<head>
	<title>Commande online</title>

	<!-- //for-mobile-apps -->
	<link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/font-awesome.css" rel="stylesheet" type="text/css" media="all" />
	<!--about-bottom -->
	<link type="text/css" rel="stylesheet" href="css/cm-overlay.css" />
	<!--about-bottom -->
	<link href="//fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Rancho" rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=PT+Sans:400,400i,700,700i" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
	<script src="js/jquery-1.9.1.js"></script>
	<style type="text/css">
		li{
			width: 76%;
   			margin-left: 46px;
   			margin-top: 30px;
			color: green;
			list-style-type: circle;
		}

		.sign {
        padding-top: 40px;
        color: #701013;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    	}
    	.f{
    		margin-bottom: 50px;
    		margin-top:30px;
    	}
    	#subCom{
    		background-color: #4CAF50;
    		border-radius: 12px;
    		margin-left:10px;
    	}
    	.inp_com {
    		width: 320px;
    	}
    	#logout{
    		background-color: red;
    		border-radius: 12px;
    		margin-left:20px;
    		display: inline-block;
  			float: left;
  			border-radius: 12px;
  			color: white;
  			width: 150px;
  			height: 30px;
  			border: hidden;
  			margin-top: 40px;
    	}
	</style>
</head>
<body>
	<div class="section main-menuAnnif" id="menu">
		<div class="container">
			<div class="main-menu-bg">
				<h3 class="w3layouts-title text-center sign">Make an order</h3>
				<?php if($_GET){?>
    					<li><?php echo $_GET['msgsucc']; ?></li>
    			<?php } ?>

				<form id="formCommander" name="formCommander" action="loginAnnif.php" method="post">
					<input type="hidden" name="date" value="<?=$_POST['date']?>" />
            		<input type="hidden" name="time" value="<?=$_POST['time']?>" />
            		<input type="hidden" name="nbrPlace" value="<?=$_POST['nbrPlace']?>" />
           			 <input type="hidden" name="typeTable" value="<?=$_POST['typeTable']?>" />
					<table id="tableCommander" class="f">
						<tr>
							
							<td><select name="typeTarte[]" id="sel0type" class="inp_com" required="required">
								<option value="" disabled selected hidden>type of Cake</option>
								<?php echo $types ;?>
							</select></td>
							<td><select name="sizeTarte[]" class="inp_com" required="required">
								<option value="" disabled selected hidden>Size The Cake</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
								<option value="XXL">XXL</option>
							</select></td>
							<td><input type="Number" name="nbrTarte[]" placeholder="Number the Cake" min="1" value="1" class="inp_com"></td>
							<td></td>
						</tr>
					</table>
					<input type="submit" class="btu_unique" value="next >" id="subCom" >
					<button type="button" name="ajouterCommande" id="ajouterCommande" class="btu_unique">New Cake</button>
					
				</form>
				<?php if (isset($_SESSION['idCl']) && $_SESSION['login'] == 1) {?>
					<form action="../controle/deconnexion.php" method="post">
						<button id="logout">Logout</button>
					</form>
				<?php } ?>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<script type="text/javascript">

		$(document).ready(function(){
			var i = 1 ;
			$('#ajouterCommande').click(function(){
				i++;
				$('#tableCommander').append('<tr id="ligne'+i+'"><td><select class="inp_com" required="required" name="typeTarte[]" id="sel'+i+'type"><option value="" disabled selected hidden>Type The Cake</option><?php echo $types ;?></select></td><td><select name="sizeTarte[]" class="inp_com" required="required"><option value="" disabled selected hidden>Size The Cake</option><option value="L">L</option><option value="XL">XL</option><option value="XXL">XXL</option></select></td><td><input type="Number" name="nbrTarte[]" min="1" value="1" placeholder="Number the Dish" class="inp_com"></td><td><button type="button" name="supprimerCommande" class="supprimer but_supp" id="'+i+'">X</button></td></tr>');
			});

			$(document).on('click' , '.supprimer' ,function(){
				var button_supp = $(this).attr('id');
				$('#ligne'+button_supp+'').remove();
			});
		});
	</script>
</body>
</html>