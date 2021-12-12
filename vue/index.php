<?php require '../model/clientImpl.php'; 
$client = new clientImpl();
$plats = $client->consulterMenu();


/*if(isset($_POST['reservation'])){
	$i = $client->inscrireClient($_POST['nom'] , $_POST['prenom'] , $_POST['email'] , $_POST['numTlphn'] , $_POST['adresse']);
	if($i == -1){
		return false;
	}
}*/

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>Master Chef</title>
	<!-- for-mobile-apps -->
	<link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="keywords" content="Spicy Bite Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<script type="application/x-javascript">
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!-- //for-mobile-apps -->
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
	<script>
		/*function reserverTable(){
			var typeTable = document.getElementById('typeTable').value ;
			var date = document.getElementById('datep').value ;
			var nbrPlace = document.getElementById('nbrPlace').value ;
			var time = document.getElementById('time').value;
			var formReservation = document.getElementById('formReservation');
			
				if(typeTable != '' && nbrPlace != '' && time != '' && date != ''){
					$.ajax({
						type : 'post',
						url : 'loginRes.php',
						data : {typeTable : typeTable, time : time , nbrPlace : nbrPlace , date : date},
						cache : false ,
						success : function(data){
							alert(data);
						}
					});
				}else{
					alert('enter data');
				}
			return false;
		}*/

		/*$(document).ready(function() {
			var ValueDate = $("#datep").val();
			var ValueTime = $("#time").val();
			var ValueNbrPlace = $("#nbrPlace").val();
			var ValueTypeTable = $("#typeTable").val();
			if (ValueDate != "" && ValueTime != "" && ValueNbrPlace != "" && ValueTypeTable != "") {
				$("#subRes").prop('disabled', false);
			}
		});*/

		function comment(){
			var email = document.getElementById('emailCommentaire').value;
			var commentaire = document.getElementById('commentaire').value;
			var starNum = document.getElementById('starCom').value;
			$.ajax({
				type:'post',
				url : '../controle/comment.php',
				data : {email : email , commentaire : commentaire , starNum : starNum},
				cache : false ,
				success : function(html){
					document.getElementById('formulaireCommentaire').reset();
					alert(html);
				} 
			});
			return false;
		}

		function contact(){
			var nom = document.getElementById('name').value;
			var prenom  = document.getElementById('prename').value ;
			var email = document.getElementById('mail').value ;
			var sujet = document.getElementById('sujet').value;
			var message = document.getElementById('message').value;
			$.ajax({
				type : "post" ,
				url : "../controle/contact.php",
				data : {nom : nom , prenom : prenom , email : email , sujet : sujet , message : message},
				cache : false ,
				success : function(html){
					document.getElementById('formulaireContact').reset();
					alert(html);
				}
			});
			return false;
		}

	</script>
	<style type="text/css">
		.star{
          color: goldenrod;
          font-size: 2.0rem;
          padding: 0 1rem; /* space out the stars */
        }
        .star::before{
          content: '\2606';    /* star outline */
          cursor: pointer;
        }
        .star.rated::before{
          /* the style for a selected star */
          content: '\2605';  /* filled star */
        }
        
        .stars{
            counter-reset: rateme 0;   
            font-size: 2.0rem;
            font-weight: 900;
        }
        .star.rated{
            counter-increment: rateme 1;
        }
        
	</style>
	<script type="text/javascript">
		document.addEventListener('DOMContentLoaded', function(){
            let stars = document.querySelectorAll('.star');
            stars.forEach(function(star){
                star.addEventListener('click', setRating); 
            });
            
            let rating = parseInt(document.querySelector('.stars').getAttribute('data-rating'));
            let target = stars[rating - 1];
            target.dispatchEvent(new MouseEvent('click'));
        });
        function setRating(ev){
            let span = ev.currentTarget;
            let stars = document.querySelectorAll('.star');
            let match = false;
            let num = 0;
            stars.forEach(function(star, index){
                if(match){
                    star.classList.remove('rated');
                }else{
                    star.classList.add('rated');
                }
                //are we currently looking at the span that was clicked
                if(star === span){
                    match = true;
                    num = index + 1;
                }
            });
            document.querySelector('.stars').setAttribute('data-rating', num);
            document.getElementById('starCom').value = num ;
        }
	</script>
</head>

<body>

	<div class="agile-banner-main" id="home">
		<div class="banner-layer">
			<div class="header-main">
				<div class="container">
					<nav class="navbar navbar-default">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>

						</div>
						<!-- navbar-header -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<ul class="nav navbar-nav navbar-right">
								<li class="scroll hvr-underline-from-center">
									<a href="index.php">Home</a>
								</li>
								<li>
									<a class="scroll hvr-underline-from-center" href="#about">About</a>
								</li>
								<li>
									<a class="scroll hvr-underline-from-center" href="#menu">Menu</a>
								</li>
								<li>
									<a class="scroll hvr-underline-from-center" href="#bookingR">Book a table</a>
								</li>
								<li>
									<a class="scroll hvr-underline-from-center" href="#team">Team</a>
								</li>
								<li>
									<a class="scroll hvr-underline-from-center" href="#testimonials">Testimonials</a>

								</li>
								
								<li>
									<a class="scroll hvr-underline-from-center" href="#contact">Contact</a>
								</li>
							</ul>
							<ul class="list-right">
								<li>
									<span class="fa fa-envelope-o list-icon" aria-hidden="true"></span>
									<a href="mailto:info@example.com">Master@gmail.com</a>
								</li>
								<li>
									<span class="fa fa-phone list-icon" aria-hidden="true"></span>
									<p> 031 87 29 06 </p>
								</li>
							</ul>
						</div>


						<div class="clearfix"> </div>
					</nav>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //menu -->
			<!-- banner -->
			<div class="container">
				<div class="banner-top">
					<div class="banner-info">
						<h1>
							<a href="index.php">
								<img src="images/logo.png" class="img-responsive" alt="" />Master Chef</a>
						</h1>
						<h2>Tasty experience in every bite!</h2>

						<div class="about-p text-center">
							<span class="sub-title"></span>
							<span class="fa fa-cutlery" aria-hidden="true"></span>
							<span class="sub-title"></span>
						</div>
						<p>make your kinda meal
							<p>

					</div>
				</div>

			</div>

			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //banner -->
	<!-- about -->
	<?php 
		$nomPlats = array();
		foreach ($plats as $plat) {
			$nomPlats[] = $plat['nomP'];
		}
		$nomPlats = array_unique($nomPlats);
		$listPlats = array();
		$p = 0 ;
		foreach ($nomPlats as $nomPlat) {
						
			for ($i=0; $i < sizeof($plats); $i++) { 
							
				if ($nomPlat == $plats[$i]['nomP']) {
					$listPlats[$p][] = $plats[$i];
				}
			}
			$p ++;
		}
	?>


	<div class="section w3ls-banner-btm-main" id="about">
		<div class="container">
			<div class="banner-btm">
				<div class="col-md-6 banner-btm-g1">
					<img src="images/about.jpg" class="img-responsive" alt="" />
				</div>
				<div class="col-md-6 banner-btm-g2">
					<h3 class="title-main">welcome to Master Chef</h3>
					<h4 class="sub-title">Feel the flavour, feel the aroma, feel the taste in every bite.</h4>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut vitae nunc auctor, malesuada est eu, pellentesque nisi.
						Nam in enim lacinia, hendrerit neque non, placerat quam.Mauris eu tortor congue purus congue iaculis sit amet tincidunt
						neque. Aliquam suscipit nisi erat, non ultricies ex aliquet a.

					</p>
					<div class="find-about">
						<a href="#" data-toggle="modal" data-target="#myModal">Find out more</a>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="about-grid">
		<div class="col-md-6 about-sub-grid">
			<div class="col-md-6 about-right about-right-flex">
				<div class="about-bottom-text">
					<h4 class="title1">our story </h4>
					<p class="text">Lorem ipsum dolor sit amet, consectetur adipi est eligendi scing elit Nam libero tempore cum soluta nobis est eligendi</p>
				</div>
				<div class="about-bottom-grid about-img1">
				</div>
			</div>
			<div class="col-md-6 about-right about-right-flex">
				<div class="about-bottom-grid about-img2">
				</div>
				<div class="about-bottom-text ab1">
					<h4 class="title1">delicious food </h4>
					<p class="text">Lorem ipsum dolor sit amet, consectetur adipi est eligendi scing elit Nam libero tempore cum soluta nobis est eligendi</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>	
		<div class="col-md-6 about-bottom-grid about-bg"></div>
		<div class="clearfix"></div>
	</div>
	<!-- //about -->

<!-- //testimonials -->
	<div class="section">
		<div class="container">
			<h3 class="w3layouts-title">Our Gallery !</h3>
			<div class="about-bottom">
				<div class="row">
					<div class="col-md-12">
						<div id="Carousel" class="carousel slide">

							<ol class="carousel-indicators">
								<li data-target="#Carousel" data-slide-to="0" class="active"></li>
								<?php for ($i=1; $i < sizeof($listPlats[0]) ; $i++) { ?>
									<li data-target="#Carousel" data-slide-to="<?=$i?>"></li>
								<?php } ?>
							</ol>

							<!-- Carousel items -->
							<div class="carousel-inner">

								<div class="item active">
									<div class="row">
										<?php for ($i=0; $i < sizeof($listPlats[0]); $i++) { 
												if ($i >= 4) {
													break;
												}
										?>

											<div class="col-md-3">
												<a href="<?=$listPlats[0][$i]['image']?>" class="thumbnail cm-overlay">
													<img src="images/<?=$listPlats[0][$i]['image']?>" alt="Image" style="max-width:100%;" width="250" height="250">
												</a>
											</div>
										<?php } ?>
									</div>
									<!--.row-->
								</div>
								<!--.item-->
								<?php for ($i=1; $i < sizeof($listPlats) ; $i++) { ?>
								<div class="item">
									<div class="row">
										<?php for ($j=0; $j < sizeof($listPlats[$i]); $j++) { 
												if ($j >= 4) {
													break;
												}
										?>
											<div class="col-md-3">
												<a href="<?=$listPlats[$i][$j]['image']?>" class="thumbnail cm-overlay">
													<img src="images/<?=$listPlats[$i][$j]['image']?>" alt="Image" style="max-width:100%;" width="250" height="250">
												</a>
											</div>
										<?php } ?>
									</div>
									<!--.row-->
								</div>
								<?php } ?>

								

							</div>
							<!--.carousel-inner-->
							<a data-slide="prev" href="#Carousel" class="left carousel-control">‹</a>
							<a data-slide="next" href="#Carousel" class="right carousel-control">›</a>
						</div>
						<!--.Carousel-->

					</div>
				</div>
			</div>
		</div>
	</div>
	<!--menu -->
	<div class="section main-menu" id="menu">
		<div class="container">
			<div class="main-menu-bg">
				<h3 class="w3layouts-title text-center">our menu</h3>
				<?php 
				$p = 0 ;
				for ($i=0; $i < sizeof($plats) ; $i++) { 
					if (array_key_exists($i, $nomPlats)) {
						$noms[$p]  = $nomPlats[$i];
						$p++;
					}
				}
				 ?>
				<div class="menu-info">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active">
							<a href="#<?=$noms[0]?>" aria-controls="<?=$noms[0]?>" role="tab" data-toggle="tab"><?=$noms[0]?></a>
						</li>
						<?php for ($i=1; $i < sizeof($plats) ; $i++) { 
								if (array_key_exists($i, $noms)) {?>
							<li role="presentation">
							<a href="#<?=$noms[$i]?>" aria-controls="<?=$noms[$i]?>" role="tab" data-toggle="tab"><?=$noms[$i]?></a>
						</li>
						<?php }} ?>				
					</ul>
				</div>
				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="<?=$listPlats[0][0]["nomP"]?>">
						
							<li>
								<div class="l_g">
									<div class="l_g_r">
										<div class="col-md-6 menu-grids">
											
											<?php for ($i=0; $i < sizeof($listPlats[0]) ; $i= $i+2) { 
													
											?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$listPlats[0][$i]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
																<h4><?=$listPlats[0][$i]['type']?></h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$listPlats[0][$i]['prix']?>DA</h4>
														</div>
														<div class="clearfix"></div>
														<p><?=$listPlats[0][$i]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
											<?php  } ?>
											
										</div>
										<div class="col-md-6 menu-grids">
											<?php for ($i=1 ; $i < sizeof($listPlats[0]) ; $i= $i+2) {?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$listPlats[0][$i]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
																<h4><?=$listPlats[0][$i]['type']?></h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$listPlats[0][$i]['prix']?>DA</h4>
														</div>
														<div class="clearfix"></div>
														<p><?=$listPlats[0][$i]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
											<?php  } ?>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</li>
						
					</div>
				<?php for ($i=1; $i < sizeof($listPlats) ; $i++) { ?>	
					<div role="tabpanel" class="tab-pane" id="<?=$noms[$i]?>">
					
							<li>
								<div class="l_g">
									<div class="l_g_r">
										<div class="col-md-6 menu-grids">
											<?php for ($j=0; $j < sizeof($listPlats[$i]) ; $j=$j+2) {
											?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$listPlats[$i][$j]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
																<h4><?=$listPlats[$i][$j]['type']?></h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$listPlats[$i][$j]['prix']?>DA</h4>
														</div>
														<div class="clearfix"></div>
														<p><?=$listPlats[$i][$j]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
											<?php } ?>
										</div>
										<div class="col-md-6 menu-grids">
											<?php for ($j=1; $j < sizeof($listPlats[$i]) ; $j=$j+2) {
											?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$listPlats[$i][$j]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
																<h4><?=$listPlats[$i][$j]['type']?></h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$listPlats[$i][$j]['prix']?>DA</h4>
														</div>
														<div class="clearfix"></div>
														<p><?=$listPlats[$i][$j]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
											<?php } ?>
										</div>
										<div class="clearfix"> </div>
									</div>
								</div>
							</li>
						
					</div>
				<?php  }?>	
				
				<a href="commander.php" class="boutonCommander" id="boutonCommander" target="_blank">Command </a> 
				<div class="clearfix"> </div>
				</div>
			</div>
		</div>
	</div>
	<!--menu-->
	<div class="menu-agileits_w3layouts section">
		<div class="container">

			<div class="load_more">
				<h3 class="w3layouts-title">
					<img src="images/menu1.png" class="img-responsive" alt="" />special dishes</h3>
					<?php
						$specials = array();
						for ($i=0; $i < sizeof($listPlats) ; $i++){
							foreach ($listPlats[$i] as $special) {
							 	if ($special['special'] == 'Oui') {
									$specials[] = $special;					
								}
							} 
						} 
					 ?>
				<ul id="myList">
					<?php for ($i=0; $i < sizeof($specials) ; $i=$i+6) { ?>
						<li>
						<div class="l_g">
							<div class="l_g_r">
								<div class="col-md-6 menu-grids">
									<?php for ($j=$i; $j < $i+6; $j=$j+2) { 
										if (sizeof($specials) <= $j) {
											break;
										}
										?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$specials[$j]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
															<h4><?=$specials[$j]['type']?> </h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$specials[$j]['prix']?></h4>
														</div>
														<div class="clearfix"></div>
														<p> <?=$specials[$j]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
									<?php 	
										} 
									?>
								</div>
								<div class="col-md-6 menu-grids">
									<?php for ($j=$i+1; $j < $i+6; $j=$j+2) { 
										if (sizeof($specials) <= $j) {
											break;
										}?>
												<div class="w3l-menu-text">
													<div class="menu-text-left">
														<img src="images/<?=$specials[$j]['image']?>" alt="" class="img-responsive" />
													</div>
													<div class="menu-text-right">
														<div class="menu-title">
															<h4><?=$specials[$j]['type']?> </h4>

														</div>
														<div class="menu-price">
															<h4 class="price-clr"><?=$specials[$j]['prix']?></h4>
														</div>
														<div class="clearfix"></div>
														<p> <?=$specials[$j]['ingredient']?></p>
													</div>
													<div class="clearfix"> </div>
												</div>
									<?php 	
										} 
									?>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
					</li>
					<?php } ?>
				</ul>
				<div class="nav-menu text-center">
					<div id="loadMore">Load more</div>
					<div id="showLess">Show less</div>
				</div>
			</div>
		</div>

	</div>
	<!--//menu-->
	<div class="section">
		<div class="w3_agileits-subscribe timings text-center">
			<h4>opening times</h4>
			<div class="about-p  text-center">
				<span class="sub-title p1"></span>
				<span class="fa fa-cutlery" aria-hidden="true"></span>
				<span class="sub-title p1"></span>

			</div>
			<div class="time">
				<h5>Monday – Friday </h5>
				<p>9:00 AM – 11:00 PM</p>
				<h5>Saturday – Sunday </h5>
				<p>8:00 AM – 00:00 AM</p>
			</div>
		</div>
	</div>
	<!--reservation-->
	
	<div id="bookingR" class="sectionR">
		<div class="section-centerR">
			<div class="container">
				<h3 class="w3layouts-titleR title-reserveR">Make a Reservation</h3>
				<div class="row">
					<div class="booking-formR">
						<form id="formReservation" action="loginRes.php" method="post" target="_blank">
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">date of reservation</span>
										<input class="form-control" id="dateRes" type="date" name="date" required>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<span class="form-label">booking time</span>
										<select class="form-control" id="timeRes" name="time" required="required">
											<option value="" disabled selected hidden>--:--</option>
											<option value="19:00">19:00</option>
											<option value="20:00">20:00</option>
											<option value="21:00">21:00</option>
											<option value="22:00">22:00</option>
											<option value="20:00">23:00</option>
											<option value="21:00">00:00</option>
										</select>
										<span class="select-arrowR"></span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<?php $tables = $client->getTables();
							//$nbrPlaces = array();
							foreach ($tables as $table)
							{
								$nbrPlaces[] = $table['nbrPlace'];
							}
							$nbrPlaces = array_unique($nbrPlaces);
						 ?>
										<span class="form-label">number of persons</span>
										<select class="form-control" required="" name="nbrPlace" id="nbrPlaceRes">
											<option value="" disabled selected hidden>-</option>
											<?php foreach ($nbrPlaces as $nbrPlace) {?>
								<option value="<?=$nbrPlace?>"><?= $nbrPlace ?> Person</option>
							<?php } ?>
										</select>
										<span class="select-arrowR"></span>
									</div>
								</div>
								<div class="col-md-2">
									<div class="form-group">
										<span class="form-label">type of table</span>
										<select class="form-control" id="typeTableRes" name="typeTable" required="required">
											<option value="" disabled selected hidden>-</option>
											<option value="public">public</option>
											<option value="private">private</option>
										</select>
										<span class="select-arrowR"></span>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-btn">
										<input type="submit" class="submit-btn" id="subRes" value="Book A Table"> 
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<!--//reservation-->



	<div class="reservation book-right" id="book">
		<div class="container">
			<h3 class="w3layouts-title title-reserve">Birthday Reservation</h3>
			

			<div class="bookB-left1"></div>
			<div class="book-right1">

				<form  class="book-right2" target="_blank" action="commanderAnnif.php" method="post">
					
					<div class="phone-info">
						<label>Date :</label>
						<input type="text" id="datepicker" required="" name="date" placeholder="Date">
					</div>
					<div class="phone-info">
						<label>Time :</label>
						<select required="" id="time" name="time">
							<option value="" disabled selected hidden>--:--</option>
							<option value="10:00">10:00</option>
							<option value="11:00">11:00</option>
							<option value="12:00">12:00</option>
							<option value="13:00">13:00</option>
							<option value="14:00">14:00</option>
							<option value="15:00">15:00</option>
							<option value="16:00">16:00</option>
							<option value="17:00">17:00</option>
							<option value="18:00">18:00</option>
							<option value="19:00">19:00</option>
							<option value="20:00">20:00</option>
							<option value="21:00">21:00</option>
							<option value="22:00">22:00</option>
						</select>
					</div>	
					<div class="form-left">
						<label>No.of People :</label>
						<?php $tables = $client->getTables();
							//$nbrPlaces = array();
							foreach ($tables as $table)
							{
								$nbrPlaces[] = $table['nbrPlace'];
							}
							$nbrPlaces = array_unique($nbrPlaces);
						 ?>
						<select required="" id="nbrPlace" name="nbrPlace">
							<option value="" disabled selected hidden>-</option>
							<?php foreach ($nbrPlaces as $nbrPlace) {?>
								<option value="<?=$nbrPlace?>"><?= $nbrPlace ?> Person</option>
							<?php } ?>
							
							
						</select>
					</div>
					<div class="form-right">
						<label>Type :</label>
						<select required="" name="typeTable">
							<option value="" disabled selected hidden>-</option>
							<option value="public">public</option>
							<option value="private">private</option>
						</select>
					</div>
					<div class="clearfix">
					</div>
					<input type="submit" name="reservation" value="Book a Table" >
				</form>
			</div>

			<div class="clearfix"> </div>
		</div>
	</div>

	

	<!--chef-->
	<?php 
		$chefs= array();
		$chefs = $client->getChefs();
	 ?>
	<div class="section chef" id="team">

		<div class="container">
			<h3 class="w3layouts-title">our cook</h3>
			<?php if (array_key_exists(0 , $chefs)) {?>
			<div class="col-sm-4 col-xs-4 chef-left">
				<img src="images/<?=$chefs[0]['image']?>" alt="" />
			</div>
			<div class="col-sm-8 col-xs-8 chef-right">
				<h4><?php echo $chefs[0]['nom']." ".$chefs[0]['prenom']; ?> </h4>
				<p><?php echo "<b>".$chefs[0]['specialite']."</b><br>".$chefs[0]['description']; ?>. </p>
			</div>
			<div class="clearfix"> </div>
		<?php } ?>
		<?php if (array_key_exists(1 , $chefs)) {?>
			<div class="col-md-7 chef-bottom-left">
				<img src="images/<?=$chefs[1]['image']?>" alt="" />
				<h4><?php echo $chefs[1]['nom']." ".$chefs[1]['prenom']; ?> </h4>
				<p><?php echo "<b>".$chefs[1]['specialite']."</b><br>".$chefs[1]['description']; ?>. </p>
			</div>
		<?php } ?>
		<?php if (array_key_exists(2 , $chefs)) {?>
			<div class="col-md-5 chef-bottom-right">
				<div class="chef-grid-left">
					<img src="images/<?=$chefs[2]['image']?>" alt="" />
				</div>
				<div class="chef-grid-right">
					<h4><?php echo $chefs[2]['nom']." ".$chefs[2]['prenom']; ?> </h4>
				<p><?php echo "<b>".$chefs[2]['specialite']."</b><br>".$chefs[2]['description']; ?>. </p>
			</div>
			<?php } ?>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
	<!-- //chef -->
	<!-- slid -->
	<div class="agiles-services-w3">
				<div class="containers">
				     <h3 class="tittles sers">OUR SERVICES</h3>
					<div class="wthrees-agiles-sevres-grids">
						<div class="cols-mds-3 wthrees-agiles-grids">
						       <div class="his-icons-wraps his-icons-effects-7 his-icons-effects-7bs">
									<a class="his-icons icon1"></a>
								</div>
								<h4>Birthday</h4>
						</div>
						<div class="cols-mds-3 wthrees-agiles-grids">
						         <div class="his-icons-wraps his-icons-effects-7 his-icons-effects-7bs">
									<a class="his-icons icon2"></a>
								</div>
								<h4>Private</h4>
						</div>
						<div class="cols-mds-3 wthrees-agiles-grids">
						        <div class="his-icons-wraps his-icons-effects-7 his-icons-effects-7bs">
									<a class="his-icons icon3"></a>
								</div>
								<h4>Delivery</h4>
						</div>
						<div class="cols-mds-3 wthrees-agiles-grids">
						        <div class="his-icons-wraps his-icons-effects-7 his-icons-effects-7bs">
									<a class="his-icons icon4"></a>
								</div>
								<h4>Free Parking</h4>
						</div>
						<div class="clearfixs"> </div>
					</div>
			    </div>
		   </div>
	<!-- //slid -->



	<!--.testimonials-->
	<?php 
		$commentaires = $client->consulterCommentaire();
	?>
	<div class="section carousel-reviews broun-block" id="testimonials">
		<div class="container">
			<h3 class="w3layouts-title text-center">Testimonials</h3>
			<div class="row">
				<div id="carousel-reviews" class="carousel slide" data-ride="carousel">

					<div class="carousel-inner">
						<div class="item active">
							<?php if (array_key_exists(0, $commentaires)) { ?>
							<div class="col-md-4 col-sm-6">
								<div class="block-text rel zmin">
									<h6>Comment</h6>
									<div class="mark">rating:
										<span class="rating-input">
											<?php $num = $commentaires[0]['starNum'] - 1;
												for ($j=0; $j <= $num ; $j++) { ?>
														<span data-value="<?= $j ?>" class="fa fa-star"></span>
											<?php } ?>
										</span>
									</div>
									<p><?= $commentaires[0]['msg'] ?></p>
											
									</div>
									<div class="person-text rel">
										<h5><?php echo $commentaires[0]['nom']." ".$commentaires[0]['prenom']; ?></h5>
										<i><?= $commentaires[0]['adresse'] ?></i>
									</div>
								</div>
							<?php } ?>
									<?php if (array_key_exists(1, $commentaires)) { ?>
									<div class="col-md-4 col-sm-6">
										<div class="block-text rel zmin">
											<h6>Comment</h6>
											<div class="mark">rating:
												<span class="rating-input">
													<?php $num = $commentaires[1]['starNum'] -1;
														for ($j=0; $j <= $num ; $j++) { ?>
														 	<span data-value="<?= $j ?>" class="fa fa-star"></span>
													<?php } ?>
												</span>
											</div>
											<p><?= $commentaires[1]['msg'] ?></p>
											
										</div>
										<div class="person-text rel">
											<h5><?php echo $commentaires[1]['nom']." ".$commentaires[1]['prenom']; ?></h5>
											<i><?= $commentaires[1]['adresse'] ?></i>
										</div>
									</div>
									<?php } ?>
									<?php if (array_key_exists(2, $commentaires)) {?>
									<div class="col-md-4 col-sm-6">
										<div class="block-text rel zmin">
											<h6>Comment</h6>
											<div class="mark">rating:
												<span class="rating-input">
													<?php $num = $commentaires[2]['starNum'] -1;
														for ($j=0; $j <= $num ; $j++) { ?>
														 	<span data-value="<?= $j ?>" class="fa fa-star"></span>
													<?php } ?>
												</span>
											</div>
											<p><?= $commentaires[2]['msg'] ?></p>
											
										</div>
										<div class="person-text rel">
											<h5><?php echo $commentaires[2]['nom']." ".$commentaires[2]['prenom']; ?></h5>
											<i><?= $commentaires[2]['adresse'] ?></i>
										</div>
									</div>
									<?php } ?>
									<div class="clearfix"></div>
						</div>
						<?php if (sizeof($commentaires) > 3) { ?>
						<div class="item">
							<?php for ($i=3; $i < sizeof($commentaires) ; $i = $i +3) { 
								if (array_key_exists($i, $commentaires)) { ?>
									<div class="col-md-4 col-sm-6">
										<div class="block-text rel zmin">
											<h6>Comment</h6>
											<div class="mark">rating:
												<span class="rating-input">
													<?php $num = $commentaires[$i]['starNum'] -1;
														for ($j=0; $j <= $num ; $j++) { ?>
														 	<span data-value="<?= $j ?>" class="fa fa-star"></span>
													<?php } ?>
												</span>
											</div>
											<p><?= $commentaires[$i]['msg'] ?></p>
											
										</div>
										<div class="person-text rel">
											<h5><?php echo $commentaires[$i]['nom']." ".$commentaires[$i]['prenom']; ?></h5>
											<i><?= $commentaires[$i]['adresse'] ?></i>
										</div>
									</div>
								<?php }
								if (array_key_exists($i+1, $commentaires)) { ?>
									<div class="col-md-4 col-sm-6">
										<div class="block-text rel zmin">
											<h6>Comment</h6>
											<div class="mark">rating:
												<span class="rating-input">
													<?php $num = $commentaires[$i+1]['starNum'] -1;
														for ($j=0; $j <= $num ; $j++) { ?>
														 	<span data-value="<?= $j ?>" class="fa fa-star"></span>
													<?php } ?>
												</span>
											</div>
											<p><?= $commentaires[$i+1]['msg'] ?></p>
										</div>
										<div class="person-text rel">
											<h5><?php echo $commentaires[$i+1]['nom']." ".$commentaires[$i+1]['prenom']; ?></h5>
											<i><?= $commentaires[$i+1]['adresse'] ?></i>
										</div>
									</div>
								<?php }
								if (array_key_exists($i+2, $commentaires)) { ?>	
									<div class="col-md-4 col-sm-6">
										<div class="block-text rel zmin">
											<h6>Comment</h6>
											<div class="mark">rating:
												<span class="rating-input">
													<?php $num = $commentaires[$i+2]['starNum'] -1;
														for ($j=0; $j <= $num ; $j++) { ?>
														 	<span data-value="<?= $j ?>" class="fa fa-star"></span>
													<?php } ?>
												</span>
											</div>
											<p><?= $commentaires[$i+2]['msg'] ?></p>
											
										</div>
										<div class="person-text rel">
											<h5><?php echo $commentaires[$i+2]['nom']." ".$commentaires[$i+2]['prenom']; ?></h5>
											<i><?= $commentaires[$i+2]['adresse'] ?></i>
										</div>
									</div>
								<?php } ?>
									<div class="clearfix"></div>
								<?php } ?>	
							</div>
						<?php } ?>	
						</div>
						<a class="left carousel-control" href="#carousel-reviews" role="button" data-slide="prev">
						<span class="fa fa-angle-left"></span>
						</a>
						<a class="right carousel-control" href="#carousel-reviews" role="button" data-slide="next">
						<span class="fa fa-angle-right"></span>
						</a>
				</div>
			</div>
		</div>
	</div>
	<!-- contact -->
	<div class="contact-bottom" id="contact">
		<div class="col-md-6  map">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3214.183508857662!2d6.586697985125583!3d36.33210208004763!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12f170af465f84dd%3A0x6f03d26716e45405!2sFast+Food+Master+Chef!5e0!3m2!1sar!2sdz!4v1553029778204" style="border:0" allowfullscreen></iframe>
		</div>
		<div class="col-md-6 contact-right">
			<h3 class="title-contact">get in touch</h3>
			<form id="formulaireContact">
				<div class="contact-input">
					<input type="text" class="name" id="name" placeholder="First Name" required="">
				</div>	
				<div class="contact-input">
					<input type="text" class="name" id="prename" placeholder="Last Name" required="">
				</div>	
				<div class="contact-input">
					<input type="email" class="name" id="mail" placeholder="Email" required="">
				</div>
				<div class="contact-input">
					<input type="text" class="name" id="sujet" placeholder="Subject" required="">
				</div>	
				<div class="contact-input">
				<textarea id="message" placeholder="Your Message" required=""></textarea>
				</div>
					<input type="submit" value="SEND MESSAGE" onclick="return contact()">
			</form>
		</div>
		<div class="clearfix"></div>
	</div>
	<!-- //contact -->
	<!--footer-->
	<div class="footer-grid">
		<div class="container">
				<div class="footer_grid_bottom contact">
					<ul>

						<li>
							<span class="fa fa-envelope-o" aria-hidden="true"></span>
							<a href="mailto:Master@gmail.com">Master@gmail.com</a>
						</li>
						<li>
							<span class="fa fa-phone" aria-hidden="true"></span>
							<p>031 87 29 06</p>
						</li>
						<li>
							<span class="fa fa-map-marker" aria-hidden="true"></span>
							<p>1234k Avenue, 4th block,Constantine City.</p>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	<div class="w3_agileits-subscribe text-center">
		<div class="subscribe-head">
			<h4>Post a Comment !</h4>
			<div>
				<form id="formulaireCommentaire">
					<input type="text" class="emailCommentaire" id="emailCommentaire" placeholder="Email" required="">

					<div class="stars" data-rating="3">
						<span class="star">&nbsp;</span>
						<span class="star">&nbsp;</span>
						<span class="star">&nbsp;</span>
						<span class="star">&nbsp;</span>
						<span class="star">&nbsp;</span>
    				</div>
					<input type="hidden" name="starCom" id="starCom">

					<textarea id="commentaire" class="commentaire" placeholder="Your Message" required=""></textarea>
					<br>
					<input type="submit" class="boutonCommenter" value="Comment" onclick="return comment()">
				</form>
				<div class="clearfix"> </div>
			</div>
			<p>Thank you for your comment</p>
		</div>
	</div>
	<div class="footer-cpy text-center">
		<div class="social_banner">
			<ul class="social_list">
				<li>
					<a href="#" class="facebook">
						<span class="fa fa-facebook" aria-hidden="true"></span>
					</a>
				</li>
				<li>
					<a href="#" class="twitter">
						<span class="fa fa-twitter" aria-hidden="true"></span>
					</a>
				</li>
				<li>
					<a href="#" class="dribble">
						<span class="fa fa-dribbble" aria-hidden="true"></span>
					</a>
				</li>
				<li>
					<a href="#" class="vimeo">
						<span class="fa fa-vimeo" aria-hidden="true"></span>
					</a>
				</li>
			</ul>
		</div>
		<div class="footer-copy">
			<p>© 2019 Master Chef. All rights reserved | Design by
				<a href="#">Chettab rania|Chabani rayene|Atrous chaima</a>
			</p>
		</div>
	</div>
	<!--//footer-->



	<!-- Tooltip -->
	<div class="tooltip-content">
		<div class="modal fade features-modal" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-md">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h3 class="modal-title">
							<img src="images/logo.png" class="img-responsive img1" alt="" />Master Chef</h3>
					</div>
					<div class="modal-body">
						<img src="images/modal.jpg" class="img-responsive" alt="image">
						<h4>Tasty experience in every bite!</h4>
						<p>Fusce et congue nibh, ut ullamcorper magna. Donec ac massa tincidunt, fringilla sapien vel, tempus massa. Vestibulum
							felis leo, tincidunt sit amet tristique accumsan. In vitae dapibus metus. Donec nec massa non nulla mattis aliquam
							egestas et mi.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //Tooltip -->

	<!-- js -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!--/js-->
	<!-- //gallery -->
	<script src="js/jquery.tools.min.js"></script>
	<script src="js/jquery.mobile.custom.min.js"></script>
	<script src="js/jquery.cm-overlay.js"></script>

	<script>
		$(document).ready(function () {
			$('.cm-overlay').cmOverlay();
		});
	</script>
	<!-- //gallery -->
	<!--start-date-piker-->
	<link rel="stylesheet" href="css/jquery-ui.css" />
	<script src="js/jquery-ui.js"></script>
	<script>
		$(function () {
			$("#datepicker,#datepicker1").datepicker();
		});
	</script>
	<!-- /End-date-piker -->
	<script type="text/javascript" src="js/move-top.js"></script>
	<script type="text/javascript" src="js/easing.js"></script>
	<script type="text/javascript">
		jQuery(document).ready(function ($) {
			$(".scroll").click(function (event) {
				event.preventDefault();

				$('html,body').animate({
					scrollTop: $(this.hash).offset().top
				}, 1000);
			});
		});
	</script>
	<!--//end-smooth-scrolling-->
	<!-- smooth-scrolling-of-move-up  -->
	<script type="text/javascript">
		$(document).ready(function () {
			/*
			var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
			};
			*/

			$().UItoTop({
				easingType: 'easeOutQuart'
			});

		});
	</script>


	<script src="js/SmoothScroll.min.js"></script>

	<script>
		$(document).ready(function () {
			size_li = $("#myList li").size();
			x = 1;
			$('#myList li:lt(' + x + ')').show();
			$('#loadMore').click(function () {
				x = (x + 1 <= size_li) ? x + 1 : size_li;
				$('#myList li:lt(' + x + ')').show();
			});
			$('#showLess').click(function () {
				x = (x - 1 < 0) ? 1 : x - 1;
				$('#myList li').not(':lt(' + x + ')').hide();
			});
		});
	</script>
	<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="js/bootstrap.js"></script>


</body>

</html>