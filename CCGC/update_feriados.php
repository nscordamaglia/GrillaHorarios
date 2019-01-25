<?php

// connect to the MySQL database server 
include("dbconnect.php"); 


		$sql = mysql_query("SELECT * FROM `feriados` LIMIT 0, 300 "); 
		$columnas = array(Mes, dia1, dia2, dia3, dia4, dia5);		
		$meses = array(Mes, Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre);
		for ($j = 1; $j < 13 ; $j++){
				
				for ($i = 1; $i< 6; $i++){
					
					$celda = $_POST["celda$j-$i"];
					$sql = 	mysql_query("
				UPDATE  `feriados` SET  `$columnas[$i]` =  '$celda' WHERE `Mes` =  '$meses[$j]'
				");		
				}
			
							}
						
												
					
							
		
mysql_close($db);
?>
