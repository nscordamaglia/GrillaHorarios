<?php session_start();
session_register('ccgc');

// connect to the MySQL database server 
include("dbconnect.php");


$user = $_GET['user'];
$pass = $_GET['pass'];
if ($user != null){
$sql = "SELECT * FROM  `empleados` WHERE `Legajo` LIKE '%$user%' LIMIT 0 , 300";
$resultado = mysql_query($sql,$db);
			if (!$resultado) {
				echo "Usuario o contraseña no valida";
				exit;
			}
			$fila = mysql_fetch_array($resultado);

			if ($fila[3] == $pass){
				
				if ($fila["Clave"] != '123456'){
					
					$sql_actua = "SELECT * FROM  `actualizaciones` LIMIT 0 , 300";
					$respuesta = mysql_query($sql_actua,$db);
					$datetime = mysql_fetch_array($respuesta);
					$legajo = $fila["Legajo"];
					$_SESSION["Legajo"]= $legajo; 
					$result = mysql_query("
								UPDATE  `empleados` SET  `Sesion` =  '1' WHERE  `empleados`.`Legajo` =  '$legajo';
								");
							
					$_SESSION["Clave"]=  $fila["Clave"];
					$_SESSION["admin"]= $fila["Admin"];
					$_SESSION["grupo"]= $fila["Grupo"];
					$_SESSION["actua"]= $datetime["Ult_actua"];
					echo "ok";
					exit;
					}else {
						echo "cambio"; 
						exit;
						}
					
				}else {
						echo "error"; 
						exit;
						
						}
}


?>

