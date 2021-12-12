<?php 
session_start();
if (! isset($_SESSION['idCl'])) { ?>
<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
    <link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
	<style>
   body {
        background:url(../images/mbg.png) no-repeat center fixed;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
    
    .sign {
        padding-top: 40px;
        color: #701013;
        font-family: 'Ubuntu', sans-serif;
        font-weight: bold;
        font-size: 23px;
    }
    
    .un {
    width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
    form.form1 {
        padding-top: 40px;
    }
    
    .pass {
            width: 76%;
    color: rgb(38, 50, 56);
    font-weight: 700;
    font-size: 14px;
    letter-spacing: 1px;
    background: rgba(136, 126, 126, 0.04);
    padding: 10px 20px;
    border: none;
    border-radius: 20px;
    outline: none;
    box-sizing: border-box;
    border: 2px solid rgba(0, 0, 0, 0.02);
    margin-bottom: 50px;
    margin-left: 46px;
    text-align: center;
    margin-bottom: 27px;
    font-family: 'Ubuntu', sans-serif;
    }
    
   li{
   	width: 76%;
   	margin-left: 46px;
   	color: red;
   }
    .un:focus, .pass:focus {
        border: 2px solid rgba(0, 0, 0, 0.18) !important;
        
    }
    
    .submit {
      cursor: pointer;
        border-radius: 5em;
        color: #fff;
        background: linear-gradient(to right, #701013, #ed9295);
        border: 0;
        padding-left: 40px;
        padding-right: 40px;
        padding-bottom: 10px;
        padding-top: 10px;
        font-family: 'Ubuntu', sans-serif;
        margin-left: 35%;
        font-size: 13px;
        box-shadow: 0 0 20px 1px rgba(0, 0, 0, 0.04);
    }
    
    .forgot {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #701013;
        padding-top: 15px;
    }
    
    a {
        text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
        color: #ed9295;
        text-decoration: none
    }
    
    @media (max-width: 600px) {
        .main {
            border-radius: 0px;
        }
    }
    input.sub {
    	text-shadow: 0px 0px 3px rgba(117, 117, 117, 0.12);
    	border:0; 
    	background:transparent; 
    	color:#ed9295;
    }
	input.sub:hover {
		text-decoration: underline; 
		cursor: pointer
	}
    .forg {
        display: inline-block;
    }
    a.forg{
        cursor: pointer;
        margin-left: 2em;
        
    }
    input.forg {
        margin-left: 9em;
        text-shadow: 0px 0px 3px;
        font-size: 13px;
    }
    a.forg:hover {
        text-decoration: underline;
    }
  </style>


</head>
<body>
	<div class="main" >
    	<p class="sign" align="center">Sign in</p>
    	<?php
    		if($_GET){?>
    			<li><?php echo $_GET['msg']; ?></li>
    		<?php       
    		} 
    	?>
    	<form class="form1" action="../controle/reservation.php" method="post">
            <input type="hidden" name="page" value="login">
      		<input class="un " type="text" name="email" align="center" placeholder="E-mail" required="required"/>
      		<input class="pass" type="password" name="pass" align="center" placeholder="Password" required="required" />
      		<input type="hidden" id="date" name="date" value="<?php echo $_POST['date'];?>" />
      		<input type="hidden" id="typeTable" name="typeTable" value="<?php echo $_POST['typeTable']; ?>" />
      		<input type="hidden" id="time" name="time" value="<?php echo $_POST['time']; ?>" />
            <input type="hidden" id="nbrPlace" name="nbrPlace" value="<?php echo $_POST['nbrPlace']; ?>" />
      		<input type="submit" class="submit" align="center" value="Sign in">
      		     		
       	</form>   
       	<form action="registerRes.php" method="post">
       		<input type="hidden" id="date" name="date" value="<?php echo $_POST['date'];?>" />
            <input type="hidden" id="typeTable" name="typeTable" value="<?php echo $_POST['typeTable']; ?>" />
            <input type="hidden" id="time" name="time" value="<?php echo $_POST['time']; ?>" />
            <input type="hidden" id="nbrPlace" name="nbrPlace" value="<?php echo $_POST['nbrPlace']; ?>" />
      		<a class="forgot forg" href="passeRecup.php" target="_blank">forget password ?</a>
            <input type="submit" value="Sign up →" class="sub forg">
      	</form>  
    </div>
    
</body>
</html>
<?php }else{
    $_SESSION['date'] = $_POST['date'];
    $_SESSION['typeTable'] = $_POST['typeTable'];
    $_SESSION['time'] = $_POST['time'];
    $_SESSION['nbrPlace'] = $_POST['nbrPlace'];
    header("Location:../controle/reservation.php");
    exit();
} ?>