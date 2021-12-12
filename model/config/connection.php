<?php 
define('HOST' , 'localhost');
define('NAME' , 'restaurant');
define('USER' , 'root');
define('PASS' , '');




	$con = mysqli_connect(HOST,USER,PASS,NAME);

	if(!$con){
		die("connection echec :".mysqli_connect_error());
	}

 ?>