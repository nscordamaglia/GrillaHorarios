<?php
 
include("dbconnect.php");


$user = $_GET['user'];
$pass = $_GET['pass'];

		
		$sql = "SELECT * FROM  `empleados` WHERE `Legajo` LIKE '%$user%' LIMIT 0 , 300";
		
		$resultado = mysql_query($sql,$db);
			if (!$resultado) {
				echo "Usuario o contraseña no valida";
				exit;
			}
			$fila = mysql_fetch_array($resultado);
			/*update en DB TECO
			$result = mysql_query("
								UPDATE  `horarios`.`empleados` SET  `Clave` =  '$pass' WHERE  `empleados`.`Legajo` =  '$user';
								");*/
			//update en DB Mydomain
			$result = mysql_query("
								UPDATE  `ccgc_horarios`.`empleados` SET  `Clave` =  '$pass' WHERE  `empleados`.`Legajo` =  '$user';
								");		
				
						header("Location:login.php?user=".$user."&pass=".$pass);
				
				
				
		   
		


?>

