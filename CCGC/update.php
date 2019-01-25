<?php



header("Content-Type: text/html;charset=utf-8");

// connect to the MySQL database server 

include("dbconnect.php");

$tabla_mes = $_POST['tabla']; 
$Mes = $_POST['mes']; 
$columnas = $_POST['columnas'];

$grupo = $_POST['grupo'];

/*si $ult_actua esta en el a�o anterior --> FrAnioActual pasa a sumarse a los francos del a�o anterior */
		$sql_c = mysql_query("SELECT `Ult_actua`  FROM `actualizaciones`  LIMIT 0 ,300");
			$rowc = mysql_fetch_array($sql_c);
			$ult_actua = $rowc[0];
			$ActParcial = explode(" ",$ult_actua);
			$ActFinal = explode("/", $ActParcial[0]);

			if (date('Y') != $ActFinal[2]){
					
					$sql_emp = mysql_query("SELECT `Apellido`,`FrAnioAnt`, `FrAnioActual` FROM `empleados` LIMIT 0, 300");
					
					while($rowc = mysql_fetch_array($sql_emp)){
					
					$empleado = $rowc[0]; 
					$FrAcum = $rowc[1] + $rowc[2];  
					$result = mysql_query("

							UPDATE  `empleados` SET  `FrAnioAnt` =  '$FrAcum' WHERE  `Apellido` =  '$empleado';

							");

													
					echo "<script>alert('A�O NUEVO!!');</script>";
						}
					}else{echo "<script>alert('MISMO NUEVO!!');</script>";}
/************Fin verificacion de a�o nuevo**************/

//$mes =  substr($tabla_mes, -5, 1); $Mes = (int)$mes;

$anio = substr($tabla_mes, -5, 4); 
	
		 if ($grupo == 'Vip')

				{
					$sql = mysql_query("SELECT * FROM  `empleados` WHERE `Grupo` = 'Externos' OR `Grupo` ='Service Manager'  ORDER BY Grupo DESC, Apellido ASC LIMIT 0 , 300");
				}
				   
				   else {
							$sql = mysql_query("SELECT * FROM  `empleados` WHERE `Grupo` = '$grupo'  ORDER BY  Apellido ASC LIMIT 0 , 300");
						}

		

		

		$cant_emp = mysql_num_rows($sql); echo "hay ".$cant_emp." empleados";
		
		 /*$hora =  (int)$hora; $hora = $hora - 3; if ($hora == '-1' ){ $hora = '23'; $mes_actua = date('n') - 1;} else if ($hora == '-2' ){ $hora = '22'; $dia_actua = date('d') - 1;} else if ($hora == '-3' ){ $hora = '21'; $dia_actua = date('d') - 1;} else {$dia_actua = date('d');}*/$hora = date('H'); $min = date('i'); $seg = date('s'); $ult_actua = date('d') . "/" . date('m') . "/". date('Y') . " a las " . $hora . ":". $min . ":" . $seg;
		
		$actua_time = mysql_query("

				UPDATE  `actualizaciones` SET  `Ult_actua` =  '$ult_actua' 	");	

				switch($Mes){ case 1 : $mes_palabra = "Enero"; 

							break;

				case 2 : $mes_palabra = "Febrero"; 

							break;

				case 3 : $mes_palabra = "Marzo"; 

							break;

				case 4 : $mes_palabra = "Abril"; 

							break;

				case 5 : $mes_palabra = "Mayo"; 

							break;

				case 6 : $mes_palabra = "Junio"; 

							break;

				case 7 : $mes_palabra = "Julio"; 

							break;

				case 8 : $mes_palabra = "Agosto"; 

							break;

				case 9 : $mes_palabra = "Septiembre"; 

							break;

				case 10 : $mes_palabra = "Octubre"; 

							break;

				case 11 : $mes_palabra = "Noviembre"; 

							break;

				case 12 : $mes_palabra = "Diciembre"; 

							break;			}

  $sql_feriado = "SELECT * FROM  `feriados` WHERE `Mes` = '$mes_palabra' LIMIT 0 , 300";

  $result_feriado = mysql_query($sql_feriado,$db);

  $feriado = mysql_fetch_array($result_feriado);

		

		

				$j = 1;  

				while($row = mysql_fetch_array($sql)){

				$empleado = $row[0]; echo "empleado: ".$empleado."/nro: ".$j;

				$guardia = 0; $franco = 0; $parcial = 0; $vacaciones = 0; 

				for ($i = 1; $i< $columnas; $i++){
					
					$celda = $_POST["celda$j-$i"]; 

					if(jddayofweek( cal_to_jd(CAL_GREGORIAN, $Mes,$i, date('Y')) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, $Mes,$i, date('Y')) , 1 ) == "Saturday" || $i == $feriado[1] || $i == $feriado[2] || $i == $feriado[3] || $i == $feriado[4] || $i == $feriado[5])

						{

							

							if ($celda != NULL){

								if ($celda == V)

								{

									$vacaciones++; 

										}else if ( $celda == 7 || $celda == 8 || $celda == 15 || $celda == 23 || $celda == 10){

											$guardia++;

											}

										}	

							}else if ($celda == FS)

								{

									$franco++; 

									}else if( $celda == V){

										

											$vacaciones++;

											}

				

				

				

				$result = mysql_query("

				UPDATE  `$tabla_mes` SET  `$i` =  '$celda' WHERE  `$tabla_mes`.`Nombre` =  '$empleado';

				");

						

									}

						$parcial = ($guardia - $franco);			echo $parcial;		

						$sql_actua = 	mysql_query("

				UPDATE  `$tabla_mes` SET  `Fr` =  '$parcial', `Vac` = '$vacaciones'  WHERE  `$tabla_mes`.`Nombre` =  '$empleado';

				");		

				$FrAcum = 0; $VacAcum = 0;

				for ($cant_meses = 1; $cant_meses < 13; $cant_meses++){

					echo " comienza a sumar ";

					$tabla = ($cant_meses).date('Y'); echo "tabla: ".$tabla;

					$sql_fr_vac = "SELECT `Fr`, `Vac`, `Nombre`  FROM `$tabla` WHERE `Nombre` = '$empleado' LIMIT 0 ,300";

					$result_fr_vac = mysql_query($sql_fr_vac,$db); 

					 

                                        if ($result_fr_vac) {
											  $Fr_Vac = mysql_fetch_array($result_fr_vac);	
                                              $FrAcum = $FrAcum + $Fr_Vac[0]; echo $FrAcum;
											  $VacAcum = $VacAcum + $Fr_Vac[1];

                                        }

					

					

				}

					echo "ahora actualizo los francos de: ".$empleado."FrAnioActual =  $FrAcum, Vacaciones = $VacAcum";

				$sql_fr_actua = 	mysql_query("

				UPDATE  `empleados` SET  `FrAnioActual` =  '$FrAcum',`Vacaciones` = '$VacAcum'  WHERE  `empleados`.`Apellido` =  '$empleado';

				");	

				$j++;

			}

		

						

												

					

							

		

mysql_close($db);

?>

