<?php 
session_start();
require '../model/config/phpMailer/PHPMailerAutoload.php';
require '../model/clientImpl.php';
include_once '../model/config/connection.php';
global $con ;
$client = new clientImpl();

if (!isset($_SESSION['idCl'])) {
	if ($_POST['page'] == "login") {

	$email = $_POST['email'];
$pass = $_POST['pass'];
$types = $_POST["typeTarte"];
$array_types = unserialize(base64_decode($types));
$nbrPlats = $_POST["nbrTarte"];
$array_nbrPlats = unserialize(base64_decode($nbrPlats));
$sizePlats = $_POST["sizeTarte"];
$array_sizePlats = unserialize(base64_decode($sizePlats));
$date =  $_POST['date'];
$nbrPlace = $_POST['nbrPlace'];
$time = $_POST['time'];
$typeTable = $_POST['typeTable'];
$longueur = count($array_types);

	$pass_hash = sha1($pass);
	$sql = "select idCl from client where email = '".$email."' and pass = '".$pass_hash."'";
	$result = mysqli_query($con , $sql);
	if($idCls = mysqli_fetch_assoc($result)){
		$idCl = $idCls['idCl'];
		$_SESSION['idCl'] = $idCl;
		$_SESSION['login'] = 1;
		$plats = array();
		for ($i=0; $i < $longueur ; $i++) { 
			if (trim($_POST["typeTarte"][$i] != '')) {
				$sql = "select numP from plat where nomP = 'tarte' and type = '".$array_types[$i]."'";
				$res = mysqli_query($con , $sql);
				if($numP = mysqli_fetch_assoc($res)){
					$plats[] = ['numP' => $numP['numP'] , 'sizeTarte' => $array_sizePlats[$i]  ,'nbrTarte' => $array_nbrPlats[$i]];
				}
			}
		}
		$p = $client->reservationTableAnnif($idCl , $date , $time , $typeTable , $nbrPlace , $plats);
		if ($p > 0) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveAnnif.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&p=".$p."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveAnnif.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
	}else{
		$msg= "your e-mail or password incorrect, Please try again ";
		header('Location:../vue/loginAnnif.php?msg='.$msg);
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
$date =  $_POST['date'];
$nbrPlace = $_POST['nbrPlace'];
$time = $_POST['time'];
$typeTable = $_POST['typeTable'];
$pass = $client->produirePass();
$pass_hash =sha1($pass);
$idCl = $client->inscrireClient($nom , $prenom , $email ,$pass_hash , $numTel , $adresse);
if ($idCl > 0) {
	$_SESSION['idCl'] = $idCl;
	$_SESSION['login'] = 1;
	$array_types = unserialize(base64_decode(unserialize(base64_decode($_POST["typeTarte"]))));
	$array_nbrPlats = unserialize(base64_decode(unserialize(base64_decode($_POST['nbrTarte']))));
	$array_sizePlats = unserialize(base64_decode(unserialize(base64_decode($_POST['sizeTarte']))));

	$longueur = count($array_types);
	$plats = array();
		for ($i=0; $i < $longueur ; $i++) { 
			if (trim($_POST["typeTarte"][$i] != '')) {
				$sql = "select numP from plat where nomP = 'tarte' and type = '".$array_types[$i]."'";
				$res = mysqli_query($con , $sql);
				if($numP = mysqli_fetch_assoc($res)){
					$plats[] = ['numP' => $numP['numP'] , 'sizeTarte' => $array_sizePlats[$i]  ,'nbrTarte' => $array_nbrPlats[$i]];
				}
			}
		}
		$p = $client->reservationTableAnnif($idCl , $date , $time , $typeTable , $nbrPlace , $plats);

		$mail->setFrom('projetpoc4@gmail.com' , 'Master Chef');
		$mail->addAddress($email);     // Add a recipient
		$mail->addReplyTo('projetpoc4@gmail.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "your password";
		$mail->Body    = '<h3>here is your password to access the <b> Master Chef </b>area :</h3> <font color="#701013">'.$pass.'</font>';

		if(!$mail->send()) {
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
  		  if ($p > 0) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveAnnif.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&p=".$p."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveAnnif.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
		}		
}else{
	$msgexist= "this e-mail already exists";
	header('Location:../vue/register.php?msgexist='.$msgexist);
	exit();
}

}
}else{

	$array_types = $_SESSION['typeTarte'];
	$array_sizePlats = $_SESSION['sizeTarte'];
	$array_nbrPlats = $_SESSION['nbrTarte'];
	$date = $_SESSION['date'];
	$time = $_SESSION['time'];
	$nbrPlace = $_SESSION['nbrPlace'];
	$typeTable = $_SESSION['typeTable'];



	$longueur = count($array_types);

	
		$idCl = $_SESSION['idCl'] ;
		
		$plats = array();
		for ($i=0; $i < $longueur ; $i++) { 
			if ($array_types[$i] != '') {
				$sql = "select numP from plat where nomP = 'tarte' and type = '".$array_types[$i]."'";
				$res = mysqli_query($con , $sql);
				if($numP = mysqli_fetch_assoc($res)){
					$plats[] = ['numP' => $numP['numP'] , 'sizeTarte' => $array_sizePlats[$i]  ,'nbrTarte' => $array_nbrPlats[$i]];
				}
			}
		}
		$p = $client->reservationTableAnnif($idCl , $date , $time , $typeTable , $nbrPlace , $plats);

		if ($p > 0) {
			$msgechec = "no";
			$msgsucc = "ok";
			header('Location:../vue/consultationReserveAnnif.php?msgsucc='.$msgsucc."&msgechec=".$msgechec."&p=".$p."&date=".$date."&time=".$time."&nbrPlace=".$nbrPlace."&typeTable=".$typeTable);
		}else{
			$msgsucc = "no";
			$msgechec = "ok";
			$msg = "sorry, there is not an empty table in this date and this time";
			header('Location:../vue/consultationReserveAnnif.php?msgechec='.$msgechec."&msg=".$msg.'&msgsucc='.$msgsucc);
		}
}



	

 ?>
