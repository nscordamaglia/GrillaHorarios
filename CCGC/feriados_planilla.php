<?php session_start();
session_register('ccgc');
if(isset($_SESSION["Legajo"])){
			
			if ($_SESSION["admin"] == "No"){
				header("Location:ajax_jquery.php?page=mostrar_plantilla.php");
				}
}
?>


<html>
<body>
<form id="form_feriados">
<?php 

$grupos = $_GET['grupos'];

//conexion
include("dbconnect.php");
//primer consulta
$sql = "SELECT * FROM  `feriados` LIMIT 0 , 300";
$respuesta = mysql_query($sql,$db);

if (!$respuesta) {//si no existe la tabla se crea

	$result = mysql_query("
						CREATE TABLE `rc000528_horarios`.`feriados` (                                                     
						  `Mes` char(10)  NULL,                                                  
						  `dia1` char(2)  NULL,
						  `dia2` char(2)  NULL ,
						  `dia3` char(2)  NULL ,
						  `dia4` char(2)  NULL,
						  `dia5` char(2)  NULL 
						  
						   
						); ");
						$meses = array(Enero,Febrero,Marzo,Abril,Mayo,Junio,Julio, Agosto,Septiembre,Octubre,Noviembre,Diciembre);
						for ($j=0; $j<12; $j++){
	$result = mysql_query("
								INSERT INTO  `rc000528_horarios`.`feriados` (
								`Mes`,
								`dia1` ,
								`dia2` ,
								`dia3` ,
								`dia4` ,
								`dia5` 
								)
								VALUES (
								'$meses[$j]', NULL, NULL, NULL, NULL, NULL);
								
								");
						}
} 



echo "<table border = '0' id = 'table1' class = 'grid'> ";

//Mostramos los nombres de las tablas

echo "\n <thead> \n <tr> \n";
$sql = "SELECT * FROM  `feriados` LIMIT 0 , 300";
$respuesta = mysql_query($sql,$db);
mysql_field_seek($respuesta,0);

while ($field = mysql_fetch_field($respuesta)){
		if ($field->name == 'Mes'){
			echo "<th id='primer_col_iz'><b>$field->name</b></th> \n";
			}else if ($field->name == 'dia5'){
				echo "<th id='primer_col_der'><b>$field->name</b></th> \n";
			      }else {
			      echo "<th><b>$field->name</b></th> \n";
			      }
}

echo "</tr> \n  </thead> \n ";
// Mientras exista una fila de datos, colocar esa fila en $fila
// como una matriz asociativa


echo "<tfoot><tr><td id='foot' colspan='6' > Feriados" ." ".Date("Y"). "</td></tr></tfoot>\n"; 
$num_fil = 1;
$sql = "SELECT * FROM  `feriados`  LIMIT 0 , 300";
$result = mysql_query($sql,$db);
while ($fila = mysql_fetch_array($result)) {
	
  
  echo "<tbody> \n <tr class='fila$num_fil'> \n"; 
    for ($i=0; $i<6; $i++){
		if ($i == 0){
			echo "<td id = 'col_nombre'>".$fila[$i]."</td> \n";
			}else{	
					echo "<td><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; padding: 0px; margin: 0px'></td> \n";
					}
	}
  echo "</tr> \n";
$num_fil++;
}
echo "</tbody> \n </table> \n"; 
 


	

mysql_close($db);
?> 
<div id="destino1" style="display:none;"></div>
<input type="button" value="Guardar" id="guardar_form"/>
</form><div id="guardar" style="display:none; "><img src="save-loader.gif"></img></div>
<script>
$("#guardar_form").bind('click',function(evento) {
  var link = $('#form_feriados').serialize();
  
   $.ajax({
     type: 'POST',
     url: 'update_feriados.php',
     data: link,
     success: function(){  $("#guardar").show('slow').delay(500).hide('slow');  }
  
       });
   
	return false;
});

</script>

</body>
</html>
