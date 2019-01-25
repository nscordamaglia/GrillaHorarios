<?php

// connect to the MySQL database server 
include("dbconnect.php");
$busqueda = $_GET['busqueda'];
$borrar = $_GET['borrar'];
$year=date('Y');
if ($borrar == "no"){
	$array = array(Apellido, Nombre, Legajo, Clave, Admin, Grupo, Horario, FrAnioAnt, FrAnioActual, Vacaciones);
			$sql = mysql_query("SELECT * FROM `empleados` WHERE `Apellido` LIKE '%$busqueda%'  LIMIT 0, 300 "); 
			$cant_emp = mysql_num_rows($sql); 
			if ($cant_emp > 0){
			echo "palabra:" .$busqueda;	}
			
			for ($filas = 0; $filas < $cant_emp ; $filas++){
					$j = $filas + 1;
					
					$row = mysql_fetch_array($sql);
					$apellido = $row[0];
					for ($i = 0; $i< 10; $i++){
					$celda[$i] = $_GET["$j-$i"];
					echo $celda[$i]."\n";
					echo $array[$i]."\n";			
					$result = mysql_query("
					UPDATE  `empleados` SET  `$array[$i]` =  '$celda[$i]' WHERE  `empleados`.`Apellido` =  '$apellido';
					");
											}
			}
}else if ($borrar == "si") {
	
	for ($i=1; $i<13; $i++){
			    $result = mysql_query("SELECT * FROM  `$i$year` LIMIT 0 , 300");
				if($result){
				$result = mysql_query("
											DELETE FROM `$i$year` WHERE `$i$year`.`Nombre` LIKE '%$busqueda%'  
		 
							");
				}
			}
	
	$result = mysql_query("
					DELETE FROM `empleados` WHERE `empleados`.`Apellido` LIKE '%$busqueda%'  ");
	}
	
	
mysql_close($db);

?>
