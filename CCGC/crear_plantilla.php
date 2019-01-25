<?php  

class Create_table {
			public function create ($tabla_mes, $mes, $year) {
			 
			include("dbconnect.php");
			
			
			
			// esta funcion me muestra cuantos dias tiene el mes en curso
			$dias_del_mes = cal_days_in_month(CAL_GREGORIAN,$mes,$year); 
			// segun sea la cantidad creo una plantilla con X columnas
			switch ($dias_del_mes) {
							case 28: {
							$result = mysql_query("
						CREATE TABLE `$tabla_mes` (                                                     
						  `Nombre` char(25)  NULL,                                                  
						  `1` char(2)  NULL,
						  `2` char(2)  NULL ,
						  `3` char(2)  NULL ,
						  `4` char(2)  NULL ,
						  `5` char(2)  NULL ,
						  `6` char(2)  NULL ,
						  `7` char(2)  NULL ,
						  `8` char(2)  NULL ,
						  `9` char(2)  NULL ,
						  `10` char(2)  NULL ,
						  `11` char(2)  NULL ,
						  `12` char(2)  NULL ,
						  `13` char(2)  NULL ,
						  `14` char(2)  NULL ,
						  `15` char(2)  NULL ,
						  `16` char(2)  NULL ,
						  `17` char(2)  NULL ,
						  `18` char(2)  NULL ,
						  `19` char(2)  NULL ,
						  `20` char(2)  NULL ,
						  `21` char(2)  NULL ,
						  `22` char(2)  NULL ,
						  `23` char(2)  NULL ,
						  `24` char(2)  NULL ,
						  `25` char(2)  NULL ,
						  `26` char(2)  NULL ,
						  `27` char(2)  NULL ,
						  `28` char(2)  NULL ,
						  `Fr` int(2)  NULL ,
						  `Vac` int(2)  NULL                                
						   
						); ");
						$sql = mysql_query("SELECT * FROM `empleados`  LIMIT 0, 300 "); 
					$cant_emp = mysql_num_rows($sql); 
					//echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0];
							$horario = ' ';/*$horario = $row[6];*/
								$result = mysql_query("
								INSERT INTO  `$tabla_mes` (
								`Nombre`,
								`1` ,
								`2` ,
								`3` ,
								`4` ,
								`5` ,
								`6` ,
								`7` ,
								`8` ,
								`9` ,
								`10` ,
								`11` ,
								`12` ,
								`13` ,
								`14` ,
								`15` ,
								`16` ,
								`17` ,
								`18` ,
								`19` ,
								`20` ,
								`21` ,
								`22` ,
								`23` ,
								`24` ,
								`25` ,
								`26` ,
								`27` ,
								`28` ,
								`Fr` ,
								`Vac` 
								
								)
								VALUES (
								'$empleado', '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario', '', ''
								);
								
								");
					}
							
					//mysql_close($db);
					break;		}
							case 29: {
							$result = mysql_query("
						CREATE TABLE `$tabla_mes` (                                                     
						  `Nombre` char(25)  NULL,                                                  
						  `1` char(2)  NULL,
						  `2` char(2)  NULL ,
						  `3` char(2)  NULL ,
						  `4` char(2)  NULL ,
						  `5` char(2)  NULL ,
						  `6` char(2)  NULL ,
						  `7` char(2)  NULL ,
						  `8` char(2)  NULL ,
						  `9` char(2)  NULL ,
						  `10` char(2)  NULL ,
						  `11` char(2)  NULL ,
						  `12` char(2)  NULL ,
						  `13` char(2)  NULL ,
						  `14` char(2)  NULL ,
						  `15` char(2)  NULL ,
						  `16` char(2)  NULL ,
						  `17` char(2)  NULL ,
						  `18` char(2)  NULL ,
						  `19` char(2)  NULL ,
						  `20` char(2)  NULL ,
						  `21` char(2)  NULL ,
						  `22` char(2)  NULL ,
						  `23` char(2)  NULL ,
						  `24` char(2)  NULL ,
						  `25` char(2)  NULL ,
						  `26` char(2)  NULL ,
						  `27` char(2)  NULL ,
						  `28` char(2)  NULL ,
						  `29` char(2)  NULL ,
						  `Fr` int(2)  NULL ,
						  `Vac` int(2)  NULL
														   
						   
						); ");
						$sql = mysql_query("SELECT * FROM `empleados`  LIMIT 0, 300 "); 
					$cant_emp = mysql_num_rows($sql); 
					//echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0];
							$horario = ' ';/*$horario = $row[6];*/
								$result = mysql_query("
								INSERT INTO  `$tabla_mes` (
								`Nombre`,
								`1` ,
								`2` ,
								`3` ,
								`4` ,
								`5` ,
								`6` ,
								`7` ,
								`8` ,
								`9` ,
								`10` ,
								`11` ,
								`12` ,
								`13` ,
								`14` ,
								`15` ,
								`16` ,
								`17` ,
								`18` ,
								`19` ,
								`20` ,
								`21` ,
								`22` ,
								`23` ,
								`24` ,
								`25` ,
								`26` ,
								`27` ,
								`28` ,
								`29` ,
								`Fr` ,
								`Vac` 
								
								)
								VALUES (
								'$empleado', '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario'  , '', ''
								);
								
								");
					}
							
					//mysql_close($db);
					break;		}
							case 30: {
							$result = mysql_query("
						CREATE TABLE `$tabla_mes` ( 
						  `Nombre` char(25)  NULL,                                                  
						  `1` char(2)  NULL,
						  `2` char(2)  NULL ,
						  `3` char(2)  NULL ,
						  `4` char(2)  NULL ,
						  `5` char(2)  NULL ,
						  `6` char(2)  NULL ,
						  `7` char(2)  NULL ,
						  `8` char(2)  NULL ,
						  `9` char(2)  NULL ,
						  `10` char(2)  NULL ,
						  `11` char(2)  NULL ,
						  `12` char(2)  NULL ,
						  `13` char(2)  NULL ,
						  `14` char(2)  NULL ,
						  `15` char(2)  NULL ,
						  `16` char(2)  NULL ,
						  `17` char(2)  NULL ,
						  `18` char(2)  NULL ,
						  `19` char(2)  NULL ,
						  `20` char(2)  NULL ,
						  `21` char(2)  NULL ,
						  `22` char(2)  NULL ,
						  `23` char(2)  NULL ,
						  `24` char(2)  NULL ,
						  `25` char(2)  NULL ,
						  `26` char(2)  NULL ,
						  `27` char(2)  NULL ,
						  `28` char(2)  NULL ,
						  `29` char(2)  NULL ,
						  `30` char(2)  NULL ,
						  `Fr` int(2)  NULL ,
						  `Vac` int(2)  NULL                                      
																	  
						   
						); ");
						$sql = mysql_query("SELECT * FROM `empleados`  LIMIT 0, 300 "); 
					$cant_emp = mysql_num_rows($sql); 
					//echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0];
							$horario = ' ';/*$horario = $row[6];*/
								$result = mysql_query("
								INSERT INTO  `$tabla_mes` (
								`Nombre`,
								`1` ,
								`2` ,
								`3` ,
								`4` ,
								`5` ,
								`6` ,
								`7` ,
								`8` ,
								`9` ,
								`10` ,
								`11` ,
								`12` ,
								`13` ,
								`14` ,
								`15` ,
								`16` ,
								`17` ,
								`18` ,
								`19` ,
								`20` ,
								`21` ,
								`22` ,
								`23` ,
								`24` ,
								`25` ,
								`26` ,
								`27` ,
								`28` ,
								`29` ,
								`30` ,
								`Fr` ,
								`Vac` 
								
								
								)
								VALUES (
								'$empleado', '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario' , '', ''
								);
								
								");
					}
							
					//mysql_close($db);
					break;		}
							case 31: {
							$result = mysql_query("
						CREATE TABLE `$tabla_mes` (                                                     
							  `Nombre` char(25)  NULL,                                                  
						  `1` char(2)  NULL,
						  `2` char(2)  NULL ,
						  `3` char(2)  NULL ,
						  `4` char(2)  NULL ,
						  `5` char(2)  NULL ,
						  `6` char(2)  NULL ,
						  `7` char(2)  NULL ,
						  `8` char(2)  NULL ,
						  `9` char(2)  NULL ,
						  `10` char(2)  NULL ,
						  `11` char(2)  NULL ,
						  `12` char(2)  NULL ,
						  `13` char(2)  NULL ,
						  `14` char(2)  NULL ,
						  `15` char(2)  NULL ,
						  `16` char(2)  NULL ,
						  `17` char(2)  NULL ,
						  `18` char(2)  NULL ,
						  `19` char(2)  NULL ,
						  `20` char(2)  NULL ,
						  `21` char(2)  NULL ,
						  `22` char(2)  NULL ,
						  `23` char(2)  NULL ,
						  `24` char(2)  NULL ,
						  `25` char(2)  NULL ,
						  `26` char(2)  NULL ,
						  `27` char(2)  NULL ,
						  `28` char(2)  NULL ,
						  `29` char(2)  NULL ,
						  `30` char(2)  NULL ,
						  `31` char(2)  NULL ,
						  `Fr` int(2)  NULL ,
						  `Vac` int(2)  NULL
						   
						); ");
						$sql = mysql_query("SELECT * FROM `empleados`  LIMIT 0, 300 "); 
					$cant_emp = mysql_num_rows($sql); 
					//echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0];
							$horario = ' ';/*$horario = $row[6];*/
								$result = mysql_query("
								INSERT INTO `$tabla_mes` (
								`Nombre`,
								`1` ,
								`2` ,
								`3` ,
								`4` ,
								`5` ,
								`6` ,
								`7` ,
								`8` ,
								`9` ,
								`10` ,
								`11` ,
								`12` ,
								`13` ,
								`14` ,
								`15` ,
								`16` ,
								`17` ,
								`18` ,
								`19` ,
								`20` ,
								`21` ,
								`22` ,
								`23` ,
								`24` ,
								`25` ,
								`26` ,
								`27` ,
								`28` ,
								`29` ,
								`30` ,
								`31` ,
								`Fr` ,
								`Vac` 
								
								)
								VALUES (
								'$empleado', '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario',  '$horario', '$horario'  , '', ''
								);
								
								");
					}
				
		//mysql_close($db);
		break;	}
	      }	
					$sql_actua = "SELECT * FROM  `actualizaciones` LIMIT 0 , 300";
					$respuesta = mysql_query($sql_actua,$db);
					$cant_fil = mysql_num_rows($respuesta);
						if ($cant_fil == 0) {
							$ult_actua = date('r');
							$result = mysql_query("
								INSERT INTO `actualizaciones` (
								`Ult_actua`)
								VALUES (
								'$ult_actua');
								
								");
							exit;
						}
							
							
						
					
					$sql = mysql_query("SELECT * FROM `$tabla_mes` "); 			
					$cant_emp = mysql_num_rows($sql);
					//echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0]; //echo $empleado;
							//$horario = ' ';/*$horario = $row[6];*/
							
					$fin = $dias_del_mes+1;
					for( $i = 1; $i < $fin; $i++){
						if((jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,$i, $year) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,$i, $year) , 1 ) == "Saturday")){
							//echo "el dia " .$i."es finde/";							
							mysql_query("UPDATE  `$tabla_mes` SET  `$i` = NULL ");
								}
				}
			}			
					
	}
}
?>
