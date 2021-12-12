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
$noms = $_POST["nomP"];
$array_noms = unserialize(base64_decode($noms));
$types = $_POST["type"];
$array_types = unserialize(base64_decode($types));
$nbrPlats = $_POST["nbrPlat"];
$array_nbrPlats = unserialize(base64_decode($nbrPlats));
$sizePlats = $_POST["sizePlat"];
$array_sizePlats = unserialize(base64_decode($sizePlats));
$longueur = count($array_noms);

	$pass_hash = sha1($pass);
	$sql = "select idCl from client where email = '".$email."' and pass = '".$pass_hash."'";
	$result = mysqli_query($con , $sql);
	if($idCls = mysqli_fetch_assoc($result)){
		$idCl = $idCls['idCl'];
		$_SESSION['idCl'] = $idCl;
		$_SESSION['login'] = 1;
		$plats = array();
		for ($i=0; $i < $longueur ; $i++) { 
			if (trim($_POST["nomP"][$i] != '')) {
				$sql = "select numP from plat where nomP = '".$array_noms[$i]."' and type = '".$array_types[$i]."'";
				$res = mysqli_query($con , $sql);
				if($numP = mysqli_fetch_assoc($res)){
					$plats[] = ['numP' => $numP['numP'] , 'sizePlat' => $array_sizePlats[$i]  ,'nbrPlat' => $array_nbrPlats[$i]];
				}
			}
		}
		$p = $client->commandeLivraison($idCl , $plats);
		$msgsucc = "your order has been sent, you will receive a call to confirm it";
		header('Location:../vue/commander.php?msgsucc='.$msgsucc);
		exit();
	}else{
		$msg= "your e-mail or password incorrect, Please try again ";
		header('Location:../vue/login.php?msg='.$msg);
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
	$noms = unserialize(base64_decode(unserialize(base64_decode($_POST['nomP']))));
	$types = unserialize(base64_decode(unserialize(base64_decode($_POST['type']))));
	$nbrPlats = unserialize(base64_decode(unserialize(base64_decode($_POST['nbrPlat']))));
	$sizePlats = unserialize(base64_decode(unserialize(base64_decode($_POST['sizePlat']))));

	$longueur = count($noms);
	$plats = array();
	for ($i=0; $i < $longueur ; $i++) { 
		if (trim($_POST['nomP'][$i] != '')) {
			$sql = "select numP from plat where nomP = '".$noms[$i]."' and type = '".$types[$i]."'";
			$res = mysqli_query($con , $sql);
			if($numP = mysqli_fetch_assoc($res)){
				$plats[] = ['numP' => $numP['numP']  , 'sizePlat' => $sizePlats[$i] ,'nbrPlat' => $nbrPlats[$i]];
			}
		}
	}
		$p = $client->commandeLivraison($idCl , $plats);

		$mail->setFrom('projetpoc4@gmail.com' , 'Master Chef');
		$mail->addAddress($email);     // Add a recipient
		$mail->addReplyTo('projetpoc4@gmail.com');

		$mail->isHTML(true);                                  // Set email format to HTML

		$mail->Subject = "your password";
		$mail->Body    = '<h3>here is your password to access the <b> Master Chef </b>area :</h3> <font color="#701013">'.$pass.'</font>';

		if(!$mail->send()) {
    		echo 'Mailer Error: ' . $mail->ErrorInfo;
		} else {
  		  $msgsucc = "your order has been sent, you will receive a call to confirm it";
		header('Location:../vue/commander.php?msgsucc='.$msgsucc);
		exit();
		}		
}else{
	$msgexist= "this e-mail already exists";
	header('Location:../vue/register.php?msgexist='.$msgexist);
	exit();
}

}
}else{
	$noms = $_SESSION['nomP'];
	$types = $_SESSION['type'];
	$nbrPlats = $_SESSION['nbrPlat'];
	$sizePlats = $_SESSION['sizePlat'];
	$idCl = $_SESSION['idCl'];
	$longueur = count($noms);
	$plats = array();
	for ($i=0; $i < $longueur ; $i++) { 
		if ($noms[$i] != '') {
			$sql = "select numP from plat where nomP = '".$noms[$i]."' and type = '".$types[$i]."'";
			$res = mysqli_query($con , $sql);
			if($numP = mysqli_fetch_assoc($res)){
				$plats[] = ['numP' => $numP['numP'] ,'sizePlat' => $sizePlats[$i] ,'nbrPlat' => $nbrPlats[$i]];
			}
		}
	}
		$p = $client->commandeLivraison($idCl , $plats);
		$msgsucc = "your order has been sent, you will receive a call to confirm it";
		header('Location:../vue/commander.php?msgsucc='.$msgsucc);
		exit();
}



	

 ?>
