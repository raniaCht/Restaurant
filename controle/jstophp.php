<?php 
require '../model/clientImpl.php'; 
$client = new clientImpl();
$plats = $client->consulterMenu();
if (isset($_POST['idSel'])) {
 	$types = '<option value="" disabled selected hidden>Type The Dish</option>';
 	foreach ($plats as $plat) {
 		if ($plat['nomP'] == $_POST['nomSel']) {
 			$types .= '<option value="'.$plat['type'].'">'.$plat['type'].'</option>';
 		}
 	}
 	echo $types;
 } 



 ?>
