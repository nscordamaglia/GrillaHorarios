<?php
include("dbconnect.php");
$sql = mysql_query("SELECT `Ult_actua`  FROM `actualizaciones`  LIMIT 0 ,300");
$row = mysql_fetch_array($sql);
$ult_actua = $row[0];
$ActParcial = explode(" ",$ult_actua);
$ActFinal = explode("/", $ActParcial[0]);

if (date('Y') != $ActFinal[2]){
		
		$sql_emp = mysql_query("SELECT `Apellido`,`FrAnioAnt`, `FrAnioActual` FROM `empleados` LIMIT 0, 300");
		
		while($row = mysql_fetch_array($sql_emp)){
		
		$empleado = $row[0]; 
		$FrAcum = $row[1] + $row[2];  
		$result = mysql_query("

				UPDATE  `empleados` SET  `FrAnioAnt` =  '$FrAcum' WHERE  `Apellido` =  '$empleado';

				");

                                        
		echo "<script>alert('$row[0] tiene $row[1] francos viejos y $row[2] del anio anterior quedadndo ahora en $FrAcum');</script>";
			}
		}else{echo "MISMO AÑO!!";}
?>