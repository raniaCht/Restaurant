<?php 
session_start();
require '../model/config/phpMailer/PHPMailerAutoload.php';
require '../model/clientImpl.php';
include_once '../model/config/connection.php';
global $con;
$client = new clientImpl();

if (!isset($_SESSION['idCl'])) {
	if ($_POST['page'] == "login") {
	

$email = $_POST['email'];
$date =  $_POST['date'];
$nbrPlace = $_POST['nbrPlace'];
$time = $_POST['time'];
$typeTable = $_POST['typeTable'];
$pass = $_POST['pass'];

	$pass_hash = sha1($pass);
	$sql = "select idCl from client where email = '".$email."' and pass = '".$pass_hash."'";
	$result = mysqli_query($con , $sql);
	if($idCls = mysqli_fetch_assoc($result)){
		$idCl = $idCls['idCl'];
		$_SESSION['idCl'] = $idCl;
		$_SESSION['login'] = 1;
		$o = $client->reservationTable($idCl , $date , $time , 'attente' , $typeTable , $nbrPlace);
		if ($o) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveTable.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&o=".$o."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveTable.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
	}else{
		$msg= "your e-mail or password incorrect, Please try again ";
		header('Location:../vue/loginRes.php?msg='.$msg);
		exit();
	}
} else {

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'projetpoc4@gmail.com';                 // SMTP username
$mail->Password = 'projetpoc1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;              
	
$nom = $_POST['nom']; 
$prenom = $_POST['prenom'];
$email = $_POST['email']; 
$numTel = $_POST['mobile']; 
$adresse = $_POST['adresse'];
$pass = $client->produirePass();
$pass_hash =sha1($pass);
$idCl = $client->inscrireClient($nom , $prenom , $email ,$pass_hash , $numTel , $adresse);
if ($idCl > 0) {
	$_SESSION['idCl'] = $idCl;
	$_SESSION['login'] = 1;
	$date =  $_POST['date'];
$nbrPlace = $_POST['nbrPlace'];
$time = $_POST['time'];
$typeTable = $_POST['typeTable'];

	$mail->setFrom('projetpoc4@gmail.com' , 'Master Chef');
		$mail->addAddress($email);     // Add a recipient
		$mail->addReplyTo('projetpoc4@gmail.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "your password";
		$mail->Body    = '<h3>here is your password to access the <b> Master Chef </b>area :</h3> <font color="#701013">'.$pass.'</font>';

		if(!$mail->send()) {
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
		}else{
			$o = $client->reservationTable($idCl , $date , $time , 'attente' , $typeTable , $nbrPlace);
			if ($o) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveTable.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&o=".$o."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveTable.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
	}
}else{
	$msgexist= "this e-mail already exists";
	header('Location:../vue/registerRes.php?msgexist='.$msgexist);
	exit();
}
}
} else {
$date =  $_SESSION['date'];
$nbrPlace = $_SESSION['nbrPlace'];
$time = $_SESSION['time'];
$typeTable = $_SESSION['typeTable'];

		$idCl = $_SESSION['idCl'];
		$o = $client->reservationTable($idCl , $date , $time , 'attente' , $typeTable , $nbrPlace);
		if ($o) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveTable.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&o=".$o."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveTable.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
}




 ?>

