<?php 
require '../model/clientImpl.php'; 
$client = new clientImpl();

global $con;

$email = $_POST['email'];
$commentaire = $_POST['commentaire'];
$starNum = $_POST['starNum'];
$sql = "select idCl from client where email = '".$email."'";

$res = mysqli_query($con , $sql);

if($idCls = mysqli_fetch_assoc($res)){
	if($client->commenter($idCls['idCl'] , $commentaire , $starNum)){
		echo "the commentaire has been sent";
	}else{
		echo "Sorry ,\n there is a problem please try again later";
	}

}else{
	echo "you can not comment that you are our customer and you have tried our dishes";
}


 ?>