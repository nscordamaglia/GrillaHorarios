<?php
// connect to the MySQL database server 
			$db = mysql_connect('sql106.bblogg.com.ar', 'host_7235397', 'popina') or die("Connection Error: " . mysql_error()); 
			 
			// select the database 
			mysql_select_db('host_7235397_horarios') or die("Error connecting to db.");
			$tabla_mes = date("n").date("Y");  
			$sql = mysql_query("SELECT * FROM `$tabla_mes` "); 
			
			$dias_del_mes = cal_days_in_month(CAL_GREGORIAN,date("m"),date("Y"));
			
					$cant_emp = mysql_num_rows($sql);
					echo "cantidad de empleados: " . $cant_emp. " dias del mes: ". $dias_del_mes . " tabla: " .$tabla_mes;
					for ($filas = 0; $filas < $cant_emp ; $filas++){
							$row = mysql_fetch_array($sql);
							$empleado = $row[0]; echo $empleado;
							//$horario = $row[6];
							
					$fin = $dias_del_mes+1;
					for( $i = 1; $i < $fin; $i++){
						if((jddayofweek( cal_to_jd(CAL_GREGORIAN, date("m"),$i, date("Y")) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, date("m"),$i, date("Y")) , 1 ) == "Saturday")){
							echo "el dia " .$i."es finde/";							
							mysql_query("UPDATE  `host_7235397_horarios`.`$tabla_mes` SET  `$i` = '' ");
								}
				}
			}	
?>
