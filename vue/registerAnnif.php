<!DOCTYPE html>
<html>
<head>
	<title>Sign up</title>
    <link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
    <style type="text/css">
		.btn { 
			display: inline-block; 
			*display: inline; *zoom: 1; 
			padding: 4px 10px 4px; margin-bottom: 0; font-size: 13px; line-height: 18px; color: #333333; text-align: center;text-shadow: 0 1px 1px rgba(255, 255, 255, 0.75); vertical-align: middle; background-color: #f5f5f5; background-image: -moz-linear-gradient(top, #ffffff, #e6e6e6); background-image: -ms-linear-gradient(top, #ffffff, #e6e6e6); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#ffffff), to(#e6e6e6)); background-image: -webkit-linear-gradient(top, #ffffff, #e6e6e6); background-image: -o-linear-gradient(top, #ffffff, #e6e6e6); background-image: linear-gradient(top, #ffffff, #e6e6e6); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#ffffff, endColorstr=#e6e6e6, GradientType=0); border-color: #e6e6e6 #e6e6e6 #e6e6e6; border-color: rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.1) rgba(0, 0, 0, 0.25); border: 1px solid #e6e6e6; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px; -webkit-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); -moz-box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.05); cursor: pointer; *margin-left: .3em; }
	.btn:hover, .btn:active, .btn.active, .btn.disabled, .btn[disabled] { background-color: #e6e6e6; }
	.btn-large { padding: 9px 14px; font-size: 15px; line-height: normal; -webkit-border-radius: 5px; -moz-border-radius: 5px; border-radius: 5px; }
	.btn:hover { color: #333333; text-decoration: none; background-color: #e6e6e6; background-position: 0 -15px; -webkit-transition: background-position 0.1s linear; -moz-transition: background-position 0.1s linear; -ms-transition: background-position 0.1s linear; -o-transition: background-position 0.1s linear; transition: background-position 0.1s linear; }
	.btn-primary, .btn-primary:hover { text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.25); color: #ffffff; }
	.btn-primary.active { color: rgba(255, 255, 255, 0.75); }
	.btn-primary { background-color: #4a77d4; background-image: -moz-linear-gradient(top, #6eb6de, #4a77d4); background-image: -ms-linear-gradient(top, #6eb6de, #4a77d4); background-image: -webkit-gradient(linear, 0 0, 0 100%, from(#6eb6de), to(#4a77d4)); background-image: -webkit-linear-gradient(top, #6eb6de, #4a77d4); background-image: -o-linear-gradient(top, #6eb6de, #4a77d4); background-image: linear-gradient(top, #6eb6de, #4a77d4); background-repeat: repeat-x; filter: progid:dximagetransform.microsoft.gradient(startColorstr=#6eb6de, endColorstr=#4a77d4, GradientType=0);  border: 1px solid #3762bc; text-shadow: 1px 1px 1px rgba(0,0,0,0.4); box-shadow: inset 0 1px 0 rgba(255, 255, 255, 0.2), 0 1px 2px rgba(0, 0, 0, 0.5); }
    .btn-primary:hover, .btn-primary:active, .btn-primary.active, .btn-primary.disabled, .btn-primary[disabled] { filter: none; background-color: #4a77d4; }
    .btn-block { width: 100%; display:block; }

    * { -webkit-box-sizing:border-box; -moz-box-sizing:border-box; -ms-box-sizing:border-box; -o-box-sizing:border-box; box-sizing:border-box; }

    html { width: 100%; height:100%; overflow:hidden; }

    body { 
    width: 100%;
    height:100%;
    font-family: 'Open Sans', sans-serif;
    background: #092756;
    background: -moz-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%),-moz-linear-gradient(top,  rgba(57,173,219,.25) 0%, rgba(42,60,87,.4) 100%), -moz-linear-gradient(-45deg,  #670d10 0%, #092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -webkit-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -webkit-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -o-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -o-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -o-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -ms-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), -ms-linear-gradient(top,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), -ms-linear-gradient(-45deg,  #670d10 0%,#092756 100%);
    background: -webkit-radial-gradient(0% 100%, ellipse cover, rgba(104,128,138,.4) 10%,rgba(138,114,76,0) 40%), linear-gradient(to bottom,  rgba(57,173,219,.25) 0%,rgba(42,60,87,.4) 100%), linear-gradient(135deg,  #670d10 0%,#092756 100%);
    filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#3E1D6D', endColorstr='#092756',GradientType=1 );
        }
    .login { 
    position: absolute;
    top: 40%;
    left: 50%;
    margin: -150px 0 0 -150px;
    width:300px;
    height:300px;
    }
    .login h1 { color: #fff; text-shadow: 0 0 10px rgba(0,0,0,0.3); letter-spacing:1px; text-align:center; }

    input { 
    width: 100%; 
    margin-bottom: 10px; 
    background: rgba(0,0,0,0.3);
    border: none;
    outline: none;
    padding: 10px;
    font-size: 13px;
    color: #fff;
    text-shadow: 1px 1px 1px rgba(0,0,0,0.3);
    border: 1px solid rgba(0,0,0,0.3);
    border-radius: 4px;
    box-shadow: inset 0 -5px 45px rgba(100,100,100,0.2), 0 1px 1px rgba(255,255,255,0.2);
    -webkit-transition: box-shadow .5s ease;
    -moz-transition: box-shadow .5s ease;
    -o-transition: box-shadow .5s ease;
    -ms-transition: box-shadow .5s ease;
    transition: box-shadow .5s ease;
    }
    input:focus { box-shadow: inset 0 -5px 45px rgba(100,100,100,0.4), 0 1px 1px rgba(255,255,255,0.2); }
</style>

	<script type="text/javascript">


function checknum(){
    var valide = /^0[5-7]\d{8}$/
    var num = document.getElementById('tel').value;
    if(valide.test(num)){
    document.getElementById('message_tel').style.color = 'green';
  document.getElementById('message_tel').innerHTML = "le num??ro de telephone valide";
  }else{
    document.getElementById('message_tel').style.color = 'red';
  document.getElementById('message_tel').innerHTML = "le num??ro de telephone n'est pas valide";
  }
} 


var email_val = function validation()
{
      var email   = document.getElementById('email').value;
        var verif   = /^[a-zA-Z0-9_-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,3}$/
        if (verif.exec(email) == null)
      {
        document.getElementById('resultat').innerHTML = "L'adresse mail n'est pas valide";
        document.getElementById('resultat').style.color = 'red';
        return true;
        }
        else
        {
        
        document.getElementById('resultat').innerHTML = "L'adresse Email est valide";
        document.getElementById('resultat').style.color = 'green';
        return false;
      } 

    }


</script>
<style type="text/css">
	li{
   	width: 76%;
   	margin-left: 46px;
   	margin-bottom: 20px;
   	color: red;
   }
</style>
</head>
<body>


<div class="login">
    <h1>Sign up</h1>
    <?php
    		if($_GET){?>
    			<li><?php echo $_GET['msgexist']; ?></li>
    		<?php       
    		} 
    	?>

    	<!-- filter_var('bob@example.com', FILTER_VALIDATE_EMAIL) -->
    <form method="post" action="../controle/CommanderAnnif.php">
    	<input type="hidden" name="page" value="register">
        <input type="text" name="prenom" placeholder="First name" required="required" />
        <input type="text" name="nom" placeholder="Last name" required="required" />
        <input type="text" name="email" placeholder="E-mail" required="required" onkeyup='email_val();' id="email" /><span id='resultat'></span>
        <input type="text" name="mobile" placeholder="Mobile number" required="required" onkeyup='checknum();' id="tel" /><span id='message_tel'></span>
        <input type="text" name="adresse" placeholder="Address" required="required" />

        <input type="hidden" id="nom" name="typeTarte" value="<?php print base64_encode(serialize($_POST['typeTarte'])); ?>" />
        <input type="hidden" id="type" name="sizeTarte" value="<?php print base64_encode(serialize($_POST['sizeTarte'])); ?>" />
        <input type="hidden" id="nbrPlat" name="nbrTarte" value="<?php print base64_encode(serialize($_POST['nbrTarte'])); ?>" />
        <input type="hidden" name="date" value="<?=$_POST['date']?>" />
        <input type="hidden" name="time" value="<?=$_POST['time']?>" />
        <input type="hidden" name="nbrPlace" value="<?=$_POST['nbrPlace']?>" />
        <input type="hidden" name="typeTable" value="<?=$_POST['typeTable']?>" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Sign Up</button>
    </form>
    
</div>


</body>
</html>