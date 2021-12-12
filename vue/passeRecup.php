<?php
require '../model/config/phpMailer/PHPMailerAutoload.php';
include_once '../model/config/connection.php';
require '../model/clientImpl.php';
$client = new clientImpl();
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    global $con;
    $sql = "select * from client where email = '".$email."'";
    $result = mysqli_query($con , $sql);
    if (mysqli_num_rows($result) > 0) {
        $pass = $client->produirePass();
        $pass_hash =sha1($pass);
        $sql = "UPDATE client SET pass = '".$pass_hash."' WHERE email = '".$email."'";
        if ($con->query($sql)) {
            $mail = new PHPMailer;

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'projetpoc4@gmail.com';                 // SMTP username
        $mail->Password = 'projetpoc1234';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; 

        $mail->setFrom('projetpoc4@gmail.com' , 'Master Chef');
        $mail->addAddress($email);     // Add a recipient
        $mail->addReplyTo('projetpoc4@gmail.com');

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = "your password";
        $mail->Body    = '<h3>here is your new password to access the <b> Master Chef </b>area :</h3> <font color="#701013">'.$pass.'</font>';

        if(!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          $msg = "your new password has been sent, you find it in your email";
        header('Location:passeRecup.php?msgsucc='.$msg);
        exit();
        }
        }
                 

    }else{
        $msg = "your email does not exist, you must register";
        header('Location:passeRecup.php?msgechec='.$msg);
        exit();
    }
}

 ?>


<!DOCTYPE html>
<html>
<head>
	<title>Forget Password</title>
    <link rel="icon" type="image/png" href="cssCons/images/icons/logo.png"/>
<style>
   body {
        background:url(../images/mbg.png) no-repeat center fixed;
        font-family: 'Ubuntu', sans-serif;
    }
    
    .main {
        background-color: #FFFFFF;
        width: 400px;
        height: 300px;
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
   	
   }
   li#msgechec{
        color: red;
   }
   li#msgsucc{
        color: green;
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
        margin-left: 25%;
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

  </style>
</head>
<body>
	<div class="main" >
    	<p class="sign" align="center">Reset Password</p>
    	<?php
    		if(isset($_GET['msgsucc'])){?>
    			<li id="msgsucc"><?php echo $_GET['msgsucc']; ?></li>
    		<?php       
    		} 
            if(isset($_GET['msgechec'])){?>
                <li id="msgechec"><?php echo $_GET['msgechec']; ?></li>
        <?php    }    	?>
    	<form class="form1" method="post">
      		<input class="un" type="text" name="email" align="center" placeholder="E-mail" required="required"/>
      		<input type="submit" class="submit" name="submit" align="center" value="Get New Password">
      	</form>   
    </div>
</body>
</html>