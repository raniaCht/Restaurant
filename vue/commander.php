<?php 
session_start();
require '../model/clientImpl.php'; 
$client = new clientImpl();
$plats = $client->consulterMenu();

foreach ($plats as $pl) {
	$nomPlats[] = $pl["nomP"]; 
}
$noms = '';
$nomPlats = array_unique($nomPlats);
foreach ($nomPlats as $nomPlat) {
	$noms .= '<option value="'.$nomPlat.'">'.$nomPlat.'</option>';
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
    		width: 250px;
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
	<div class="section main-menuC" id="menu">
		<div class="container">
			<div class="main-menu-bg">
				<h3 class="w3layouts-title text-center sign">Make an order</h3>
				<?php if($_GET){?>
    					<li><?php echo $_GET['msgsucc']; ?></li>
    			<?php } ?>
				<form id="formCommander" name="formCommander" action="login.php" method="post">
					
					<table id="tableCommander" class="f">
						<tr>
							<td><select name="nomP[]" id="sel0" class="rania inp_com" required="required">
								<option value="" disabled selected hidden>Name of Dish</option>
								<?php echo $noms ;?>
									
							</select></td>
							<td><select name="type[]" id="sel0type" placeholder="Name of Dish" class="inp_com" required="required">
								<option value="" disabled selected hidden>Type The Dish</option>
							</select></td>
							<td><select name="sizePlat[]" placeholder="size of Dish" class="inp_com" required="required">
								<option value="" disabled selected hidden>Size The Dish</option>
								<option value="L">L</option>
								<option value="XL">XL</option>
								<option value="XXL">XXL</option>
							</select></td>
							<td><input type="Number" name="nbrPlat[]" placeholder="Number the Dish" min="1" value="1" class="inp_com"></td>
							<td></td>
						</tr>
					</table>
					
					<input type="submit" class="btu_unique" value="next >" id="subCom" disabled="disabled">
					<button type="button" name="ajouterCommande" id="ajouterCommande" class="btu_unique">New Dish</button>
					
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
			$('.rania').change(function(){
				
			  if($(this).val() != '')
			  {
			   var action = $(this).attr("id");
			   var query = $(this).val();
			   var result = action+'type';
			   $.ajax({
			    url:"../controle/jstophp.php",
			    method:"POST",
			    data:{idSel:action, nomSel:query},
			    success:function(data){
			     $('#'+result).html(data);
			    }
			   })
			  }
			 });

			$(document).ready(function() {
				var SelectValueType = $("#sel0type").val();
				var SelectValue = $("#sel0").val();
				if (SelectValue == "" && SelectValueType == "") {
					$("#subCom").prop('disabled', true);
				}
				$("#sel0").change(function(){
					if($(this).val() == ""){
						$("#subCom").prop('disabled', true);
					}else {
						$("#sel0type").change(function(){
							if($(this).val() == ""){
								$("#subCom").prop('disabled', true);
							}else {
								$("#subCom").prop('disabled', false);
							}
						});
					}
				});

			});

			$(document).ready(function() {
				var demoSelectValue = $("#sel0type").val();
				if (demoSelectValue == "") {
					$("#subCom").prop('disabled', true);
				}
				$("#sel0type").change(function(){
					if($(this).val() == ""){
						$("#subCom").prop('disabled', true);
					}else {
						$("#subCom").prop('disabled', false);
					}
				});
			});

			 $(document).on('change' , '.rania' ,function(){
				
			  if($(this).val() != '')
			  {
			   var action = $(this).attr("id");
			   var query = $(this).val();
			   var result = action+'type';
			   $.ajax({
			    url:"../controle/jstophp.php",
			    method:"POST",
			    data:{idSel:action, nomSel:query},
			    success:function(data){
			     $('#'+result).html(data);
			    }
			   })
			  }
			 });	
        		
        	
			$('#ajouterCommande').click(function(){
				i++;
				$('#tableCommander').append('<tr id="ligne'+i+'"><td><select name="nomP[]" required="required" id="sel'+i+'" class="rania inp_com"><option value="" disabled selected hidden>Name of Dish</option><?php echo $noms ;?></select></td><td><select class="inp_com" required="required" name="type[]" id="sel'+i+'type" placeholder="Name of Dish"><option value="" disabled selected hidden>Type The Dish</option></select></td><td><select name="sizePlat[]" placeholder="size of Dish" class="inp_com" required="required"><option value="" disabled selected hidden>Size The Dish</option><option value="L">L</option><option value="XL">XL</option><option value="XXL">XXL</option></select></td><td><input type="Number" name="nbrPlat[]" min="1" value="1" placeholder="Number the Dish" class="inp_com"></td><td><button type="button" name="supprimerCommande" class="supprimer but_supp" id="'+i+'">X</button></td></tr>');
			});

			$(document).on('click' , '.supprimer' ,function(){
				var button_supp = $(this).attr('id');
				$('#ligne'+button_supp+'').remove();
			});

			/*$('#submit').click(function(){
				$.ajax({
					url : 'login.php',
					method : 'post',
					data : $('#formCommander').serialize(),
					success : function(data){
						alert(data);
						$('#formCommander')[0].reset();
					}
				});
			});*/
		});
	</script>
</body>
</html>