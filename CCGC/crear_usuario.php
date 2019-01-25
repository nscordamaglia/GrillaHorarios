<?php session_start();

if(isset($_SESSION["Legajo"])){
			
			if ($_SESSION["admin"] == "No"){
				header("Location:ajax_jquery.php?page=mostrar_plantilla.php");
				}
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
 
<html> 
<head>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<script src="/jquery/jquery-1.4.2.js" type="text/javascript"></script>
</head>
<body>
<?php 
$grupos = $_GET['grupos'];
include_once("crear_emp.php");
// connect to the MySQL database server 
include("dbconnect.php");

//carga de empleado
echo "<style> label {display:block; width:15px;}</style>";
echo "<div style='border:1px solid black'><form action='crear_usuario.php' method='post' accept-charset='utf-8'> ";
echo "<label>Nombre</label><input type='text' placeholder='Campo Obligatorio' name='nombre'/><br>";
echo "<label>Apellido</label><input type='text' placeholder='Campo Obligatorio' name='apellido'/><br>";
echo "<label>Legajo</label><input type='text' placeholder='Campo Obligatorio' name='user'/><br>";
echo "<label>Clave</label><input type='password' name='pass'/><br>";

echo "<select name='grupo'>";
echo  "<option>Front</option>";
echo  "<option>Back</option>";
echo  "<option>Prestacion</option>";
echo  "<option>Service Manager</option>";
echo  "<option>Externos</option>";
echo  "<option>Movil</option>";
echo  "<option>Responsable</option>";
echo  "<option>PYMES</option>";
echo "</select>";

echo "<select name='horario'>";
echo  "<option>6</option>";
echo  "<option>7</option>";
echo  "<option>8</option>";
echo  "<option>9</option>";
echo  "<option>12</option>";
echo  "<option>15</option>";
echo  "<option>23</option>";
echo "</select>";
echo "<input type='checkbox' name='admin' value='admin'/>Administrador<br>";
echo "<input type='radio' name='planillas' value='todas'/>Todas las planillas<br>";
echo "<input type='radio' name='planillas' value='adelante'/>De aca en adelante<br>";
echo "<input type='submit' value='Cargar' />";
echo "</form></div>";


$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$user = $_POST['user'];
$pass = $_POST['pass'];
$admin = $_POST['admin'];
$grupo = $_POST['grupo'];
$horario = $_POST['horario'];
$planillas = $_POST['planillas'];


if ($admin == "admin")
	{
		
		$admin = 'Si';
	}
	else {
			
			$admin = 'No';
		}

$sql = "SELECT * FROM  `empleados` LIMIT 0 , 300";
$respuesta = mysql_query($sql,$db);

if ($nombre != null && $apellido != null && $user != null){ // no debe ser vacio ni el nombre ni el apellido ni usuario
	
		if (!$respuesta) {//si no existe la tabla se crea
			$t = new Crear_tabla_emp();
			$t->create();
			
			} 
		$result = mysql_query("
									INSERT INTO `empleados` (
		`Apellido` ,
		`Nombre` ,
		`Legajo` ,
		`Clave` ,
		`Admin` ,
		`Grupo` ,
		`Horario`,
		`FrAnioAnt`, 	 	
		`FrAnioActual`,
		`Vacaciones`
		)
		VALUES (
		'$apellido', '$nombre', '$user', '$pass', '$admin', '$grupo', '$horario', '0', '0', '0' 
		);
									
							");
		//mysql_close($db);
		
		//cargo el empleado en la base de los horarios
		$mes = date("n");//trae el mes solicitado
		$year = date("Y");
		$tabla_mes = $mes.$year; //forma el nombre de la tabla con el mes y el ao en curso
		if($planillas == "todas"){
			for ($i=1; $i<13; $i++){
			    $result = mysql_query("SELECT * FROM  `$i$year` LIMIT 0 , 300");
				if($result){
				$result = mysql_query("
											INSERT INTO `$i$year` (
				
				`Nombre` 
				
				)
				VALUES (
				'$apellido'
				);
		 
							");
				}
			}
		}else{for ($i=$mes; $i<13; $i++){
			    $result = mysql_query("SELECT * FROM  `$i$year` LIMIT 0 , 300");
				if($result){
				$result = mysql_query("
											INSERT INTO `$i$year` (
				
				`Nombre` 
				
				)
				VALUES (
				'$apellido'
				);
		 
							");
				}
			}
		}
		
		for ($i=1; $i<4; $i++){
				$anioSig = $year + 1;
				
			    $result = mysql_query("SELECT * FROM  `$i$anioSig` LIMIT 0 , 300");
				if($result){
				$result = mysql_query("
											INSERT INTO `$i$anioSig` (
				
				`Nombre` 
				
				)
				VALUES (
				'$apellido'
				);
		 
							");
				}
			}		
		
		
			} else { echo "<p style='text-align:center; font-size: x-large;'><strong>******Debe colocar el Nombre / Apellido / Legajo del empleado.********</strong></p>";}
//fin carga de empleado

//busqueda de empleado			
echo "<div style='border:1px solid black; ' id='cuadro_de_busqueda'><form id='search' action='crear_usuario.php?grupos=$grupos' method='post' accept-charset='utf-8'> ";
echo "Apellido<input type='text' id='search_apellido' name='search_apellido'/><br>";
echo "<input type='submit'  value='Buscar' id='buscar'/><input  type='reset' value='Limpiar' id='limpiar' />";
echo "</form></div><br>";
//fin busqueda

//tabla de empleados
echo "<div class='buscarxapellido' style='border:1px solid black; '><form id='target' >";
$search_apellido = $_POST['search_apellido'];

$sql = "SELECT * FROM  `empleados` WHERE `Apellido` LIKE '%$search_apellido%' LIMIT 0 , 300";
$resultado = mysql_query($sql,$db);

if (!$resultado) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
         "en la BD: " . mysql_error();
    exit;
}
$cant_fil = mysql_num_rows($resultado);
if ($cant_fil == 0) {
    echo "No se han encontrado filas, nada a imprimir, asi que voy " .
         "a detenerme.";
    exit;
} else{



echo "<table border = '0' id = 'table1' class = 'grid'> ";

//Mostramos los nombres de las tablas

echo "\n <thead> \n <tr> \n";

mysql_field_seek($resultado,0);

while ($field = mysql_fetch_field($resultado)){
		      echo "<th><b>$field->name</b></th> \n";
		
}

echo "</tr> \n  </thead> \n ";
// Mientras exista una fila de datos, colocar esa fila en $fila
// como una matriz asociativa

$columnas = mysql_num_fields($resultado);

$num_fil = 1;
echo "<tbody> \n <tr> \n";
while ($fila = mysql_fetch_array($resultado)) {

  //echo "<tbody> \n <tr> \n"; 
    for ($i=0; $i<$columnas; $i++){
	
		if ($search_apellido == null){
				if ($i == '3')
				{
						echo "<td>********</td> \n";
				}
				else {
						echo "<td>".$fila[$i]."</td> \n";
					 }
				
		} else {
		switch ($i) {
			    case 0:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=15/></td> \n";
			        break;
			    case 1:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=15/></td> \n";
			        break;
			    case 2:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=7/></td> \n";
			        break;
			    case 3:
			        echo "<td><input type='password' name='$num_fil-$i' value='$fila[$i]' size=8/></td> \n";
			        break;
			    case 4:
						echo "<td><select name='$num_fil-$i' id='$num_fil-$i'>";
						echo  "<option Id='Si'>Si</option>";
						echo  "<option Id='No'>No</option>";
						echo "</select></td> \n";
						echo "<script type='text/javascript'>var valorOption = '".$fila[$i]."'; var Idselect = '$num_fil-$i'; 
							document.getElementById(Idselect).options.namedItem(valorOption).selected='true';</script>";
			        break;
			    case 5:
						echo "<td><select name='$num_fil-$i' id='$num_fil-$i'>";
						echo  "<option Id='Front'>Front</option>";
						echo  "<option Id='Back'>Back</option>";
						echo  "<option Id='Prestacion'>Prestacion</option>";
						echo  "<option Id='Service Manager'>Service Manager</option>";
						echo  "<option Id='Externos'>Externos</option>";
						echo  "<option Id='Movil'>Movil</option>";
						echo  "<option Id='Responsable'>Responsable</option>";
						echo  "<option Id='PYMES'>PYMES</option>";
						echo "</select></td> \n";
						echo "<script type='text/javascript'>var valorOption = '".$fila[$i]."'; var Idselect = '$num_fil-$i'; 
							document.getElementById(Idselect).options.namedItem(valorOption).selected='true';</script>";

			        break;
			    case 6:
						echo "<td><select name='$num_fil-$i' id='$num_fil-$i'>";
						echo  "<option Id='6'>6</option>";
						echo  "<option Id='7'>7</option>";
						echo  "<option Id='8'>8</option>";
						echo  "<option Id='9'>9</option>";
						echo  "<option Id='12'>12</option>";
						echo  "<option Id='15'>15</option>";
						echo  "<option Id='23'>23</option>";
						echo "</select></td> \n";
						echo "<script type='text/javascript'>var valorOption = '".$fila[$i]."'; var Idselect = '$num_fil-$i'; 
							document.getElementById(Idselect).options.namedItem(valorOption).selected='true';</script>";
			        break;
			    case 7:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=2/></td> \n";
			        break;
			    case 8:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=2/></td> \n";
			        break;
			    case 9:
			        echo "<td><input type='text' name='$num_fil-$i' value='$fila[$i]' size=2/></td> \n";
			        break;              
			}
			
		}
											
	}
  if ($search_apellido == null){echo "<td><input type='button'  value='Editar' name='editar' class='editar' id='$fila[0]' /></td>";}
  echo "</tr> \n";
$num_fil++;
}
echo "</tbody> \n </table><input type='hidden' name='busqueda' value='$search_apellido'><input type='hidden' id='op_borrar' name='borrar' value='no'><input type='hidden' id='grupo' name='grupo' value='$grupos'>";
if  ($search_apellido!= null){
	echo "<input  type='submit' id='btn_guardar' value='Guardar'/><input type='submit' id='btn_eliminar' value='Eliminar' /><div id='guardar' style='display:none; '><img src='save-loader.gif'></img></div>";
}
echo "</form></div> \n"; //fin tabla
 }


?>
<div id="destino1" style="display:none"></div>

</body>
<script>
$("#target").submit(function(evento) {
	
  var link = $(this).serialize();
  //alert(link);
   $("#destino1").load("update_emp.php?"+link, function(){
						$("#guardar").show('slow').delay(5000).hide('slow');
						
						
		});
	return false;
});

$('.editar').click(function() {
  alert('<?php echo $grupos?>');
  $("#search_apellido").val(this.id);
  document.getElementById("search").submit();
 
});



$('#btn_eliminar').click(function() {
  
 document.getElementById("op_borrar").value = "si";
 
});

$('#btn_guardar').click(function() {
  
 document.getElementById("op_borrar").value = "no";
 
});

</script>
<div style="positio:absolute; top:20%; left:70%;"><a href="ajax_jquery.php?grupo=<?php echo $grupos; ?>&page=cargar_plantilla.php"><img src="but_back.png" style="text-decoration:none"></img></a></div>
</html>
