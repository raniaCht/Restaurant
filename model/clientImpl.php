<?php 

include_once 'config/connection.php';
	

class ClientImpl
{
	
	function consulterCommentaire()
	{
		global $con ;
		$sql = "SELECT * FROM comment , client , membre WHERE comment.idCl = client.idCl AND client.idCl = membre.idM AND vue = 1";
		$result = mysqli_query($con , $sql);
		$commentaires = array();
		if (mysqli_num_rows($result) > 0) {
			$p = 0 ;
			while ($commentaire = mysqli_fetch_assoc($result)) {
				$commentaires[$p] = $commentaire ; 
				$p++;
			}
		}
		return $commentaires ;
	}

	function consulterMenu(){
		global $con ;
		$plats = array();
		$result = mysqli_query($con,'select * from plat');
 		
		if(mysqli_num_rows($result) > 0){
			while ($plat = mysqli_fetch_assoc($result)) {
					$plats[] = $plat;
			}
		}
		return $plats;
	}

	function getTables(){
		global $con ;
		$tables = array();
		$query = "select * from tablee";
		$result = mysqli_query($con , $query);
		while ($table = mysqli_fetch_assoc($result)) {
			$tables[]=$table;
		}
		return $tables;
	}

	function getChefs(){
		global $con ;
		$tables = array();
		$query = "select * from chef , membre WHERE chef.idCh = membre.idM";
		$result = mysqli_query($con , $query);
		while ($chef = mysqli_fetch_assoc($result)) {
			$chefs[]=$chef;
		}
		return $chefs;
	}
	

	function produirePass(){
		return strtoupper(substr(md5(uniqid()), 0,6));
	}

	function inscrireClient($nom , $prenom , $email , $pass , $numTel , $adresse){
		global $con ;
		$sql = "SELECT * FROM client , membre WHERE client.idCl = membre.idM and email = '".$email."'";
		$result = mysqli_query($con , $sql);
		if(mysqli_num_rows($result) == 0){
			$sql = "INSERT into membre (nom , prenom) values ('$nom' , '$prenom')";
			if ($con->query($sql) == TRUE) {
				$idCl = $con->insert_id;
				$sql = "INSERT into client (idCl , email , pass , numTlphn , adresse) values (".$idCl.",'$email' ,'$pass', '$numTel','$adresse')";
				mysqli_query($con , $sql);
				return $idCl;
			}
		}else{
			return -1;
		}
	}

	function reservationTable($idCl , $date , $time , $etat , $type , $nbrPlace){
		global $con;
		$result = mysqli_query($con , "SELECT * FROM `tablee` WHERE type = '".$type."' and numT NOT IN (SELECT tablee.numT FROM `reservationtable`,`tablee` WHERE reservationtable.numT = tablee.numT AND date = '".$date."' AND time = '".$time."')");

		if(mysqli_num_rows($result) > 0){
			$q = false;
			while ($table = mysqli_fetch_assoc($result)) {
				if($table['nbrPlace'] == $nbrPlace){
					
					$q = mysqli_query($con , "insert into reservationtable (idCl , numT , date , time , etat) values (".$idCl." , ".$table['numT']." , '".$date."' , '".$time."' , '".$etat."') " );
					break;
				}
			}
			return $table['numT'];
		}else{
			return false;
		}
	}


	function reservationTableAnnif($idCl , $date , $time , $typeTable , $nbrPlace , $plats){
		global $con;
		$result = mysqli_query($con , "SELECT * FROM `tablee` WHERE type = '".$typeTable."' and numT NOT IN (SELECT tablee.numT FROM `reservationtable`,`tablee` WHERE reservationtable.numT = tablee.numT AND date = '".$date."' AND time = '".$time."')");

		if(mysqli_num_rows($result) > 0){
			//$q = false;
			while ($table = mysqli_fetch_assoc($result)) {
				if($table['nbrPlace'] == $nbrPlace){
					$sql = "insert into reservationtable (numT ,idCl , date , time , etat) values (".$table['numT']." , ".$idCl." , '".$date."' , '".$time."' , 'attente')";
					if ($con->query($sql) == TRUE) {
						$numR = $con->insert_id;
						$sql = "INSERT into commande (paye , etat) values('Non' , 'attente')";
						if ($con->query($sql) == TRUE) {
						$numCo = $con->insert_id;
						foreach ($plats as $plat) {
						$sql = "INSERT INTO lignecommande(numCo , numP ,sizePlat , nbrPlat , ordre , etat) VALUES (".$numCo.",".$plat['numP'].",'".$plat['sizeTarte']."',".$plat['nbrTarte']." , '1','attente')";
						
						mysqli_query($con , $sql);
						}
					
					$sql = "INSERT into commandesurplace (numCo ,numT ) values(".$numCo.",".$table['numT'].")";
					mysqli_query($con , $sql);
					$sql = "INSERT into birthday (numR , numCo ) values(".$numR.",".$numCo.")";
					mysqli_query($con , $sql);
					
					}}
					return $table['numT'];
				}
			}
		}else{
			return -1;
		}
	}

	function commenter($idCl , $msg ,$starNum){
		global $con;
		$sql = "insert into comment (idCl , msg , starNum , vue) values (".$idCl.",'".$msg."',".$starNum.",'no')";
		$q = mysqli_query($con , $sql);
		return $q;
	}

	function commandeSurPlace($numT , $plats){
		global $con ;
		
		$sql = "INSERT into commande (paye , etat) values('Non' , 'attente')";
		$r = mysqli_query($con , $sql);
				
		$sql = "SELECT numCo FROM commande WHERE numCo NOT IN (SELECT numCo FROM lignecommande)";
		$result = mysqli_query($con , $sql);
		if ($numC = mysqli_fetch_assoc($result)) {
			foreach ($plats as $plat) {
				$sql = "INSERT INTO lignecommande(numCo , numP , nbrPlat , ordre , etat) VALUES (".$numC['numCo'].",".$plat['numP'].",".$plat['nbrPlat']." , '1','attente')";
				mysqli_query($con , $sql);
			}
			$sql = "INSERT into commandesurplace (numCo ,numT ) values(".$numC['numCo'].",".$numT.")";
		 	$p = mysqli_query($con , $sql);
		 	return $p;
		}
	}

	function commandeLivraison($idCl , $plats){
		global $con ;
		
		$sql = "INSERT into commande (paye , etat) values('Non' , 'attente')";
		if ($con->query($sql) == TRUE) {
			$numC = $con->insert_id;
			foreach ($plats as $plat) {
				$sql = "INSERT INTO lignecommande(numCo , numP ,sizePlat , nbrPlat , ordre , etat) VALUES (".$numC.",".$plat['numP'].",'".$plat['sizePlat']."',".$plat['nbrPlat']." , '1','attente')";
				mysqli_query($con , $sql);
			}
			$sql = "INSERT into commandelivraison (numCo ,idCl ) values(".$numC.",".$idCl.")";
			mysqli_query($con , $sql);
		}		
	}
}

 ?>