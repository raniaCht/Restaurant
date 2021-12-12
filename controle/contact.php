<?php 

require '../model/config/phpMailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'projetpoc4@gmail.com';                 // SMTP username
$mail->Password = 'projetpoc1234';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

	$nom = $_POST['nom'];
	$prenom =$_POST['prenom'];
	$to =$_POST['email'];
	$message = "<h3>".$_POST['message']."</h3>";
	$subject = $_POST['sujet'];


$mail->setFrom($to , $nom." ".$prenom);
$mail->addAddress('projetpoc4@gmail.com');     // Add a recipient
$mail->addReplyTo($to);

$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $subject;
$mail->Body    = $message;

if(!$mail->send()) {
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

 ?>