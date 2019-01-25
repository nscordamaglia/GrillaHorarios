<?php 
class Crear_tabla_emp {
			public function create () {
 
include("dbconnect.php");

$result = mysql_query("
						CREATE TABLE `host_7235397_horarios`.`empleados` (                                                     
						  `Apellido` 	char(25) NULL,
						  `Nombre`   	char(25) NULL,                                                  
						  `Legajo`   	char(7)  NULL,
						  `Clave`    	char(6)  NULL,
						  `Admin`    	char(2)  NULL,
						  `Grupo`    	char(20) NULL,
						  `Horario` 	int(2)   NULL,
						  `FrAnioAnt` 	int(2)   NULL,
						  `FrAnioActual`int(2)   NULL,
						  `Vacaciones` 	int(2)   NULL
						  
						  )
						  ");


			}
}

?>
