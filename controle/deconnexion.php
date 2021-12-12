<?php 
session_start();
if (isset($_SESSION['idCl']) && $_SESSION['login'] == 1) {
unset($_SESSION['idCl']);
$_SESSION['login'] = 0;
session_destroy();
header('Location:../vue/index.php');
}


 ?>