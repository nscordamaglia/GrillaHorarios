<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
		<style>
			.franco {
				font-family:"Arial";
				background-color:#66CC33;
					}
			.vacas {
				font-family:"Comic";
				background-color:#FFFF99;
			}
			.finde {
				font-family:"Comic";
				background-color:#66CCFF;
			}
			th {
				background-color:#235fab;
			}
			td {
				background-color:#FFFFCC;
			}
		</style>
		 <script src="/jquery/jquery-1.4.2.js" type="text/javascript"></script>  
		 	 
<script>
$(document).ready(function(){
   $("#ocultar").click(function(event){
    event.preventDefault();
    $("#capaefectos").hide("slow");
   });

   $("#mostrar").click(function(event){
    event.preventDefault();
    $("#capaefectos").show(1000);
   });
});


</script>
	</head>

<body>

<div id="capaefectos" style="padding:10px;">
<?php





$dblink = mysql_connect('sql106.bblogg.com.ar', 'host_7235397', 'popina');
mysql_select_db("host_7235397_horarios",$dblink);
$sql_statement = "SELECT * FROM  `42010` LIMIT 0 , 300";
$resultado = mysql_query($sql_statement,$dblink);



$resultado = mysql_query($sql_statement,$dblink);

if (!$resultado) {
    echo "No pudo ejecutarse satisfactoriamente la consulta ($sql) " .
         "en la BD: " . mysql_error();
    exit;
}
$row = mysql_num_rows($resultado);
if ($row == 0) {
    echo "No se han encontrado filas, nada a imprimir, asi que voy " .
         "a detenerme.";
    exit;
} else{


$columnas = count($row)-1;
echo $columnas; 

echo "<table border = '0' id = 'table1'> ";

//Mostramos los nombres de las tablas

echo "\n <thead> \n <tr> \n";

mysql_field_seek($resultado,0);

while ($field = mysql_fetch_field($resultado)){

echo "<th><b>$field->name</b></th> \n";

}

echo "</tr> \n  </thead> \n ";
// Mientras exista una fila de datos, colocar esa fila en $fila
// como una matriz asociativa
// Nota: Si solo espera una fila, no hay necesidad de usar un ciclo
// Nota: Si coloca extract($fila); dentro del siguiente ciclo,
//       estará creando $id_usuario, $nombre_completo, y $status_usuario

while ($fila = mysql_fetch_array($resultado)) {

  echo "<tbody> \n <tr> \n"; 
    for ($i=0; $i<$columnas; $i++){
	
		if ($fila[$i] == FS)
		{
			echo "<td class='franco'>" .$fila[$i]."</td> \n";
		}else if ($fila[$i] == V){
			echo "<td class='vacas'>" .$fila[$i]."</td> \n";
				}else if(jddayofweek( cal_to_jd(CAL_GREGORIAN, date("m"),$i, date("Y")) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, date("m"),$i, date("Y")) , 1 ) == "Saturday"){
					echo "<td class='finde'>" .$fila[$i]."</td> \n";
				}else {echo "<td>" .$fila[$i]."</td> \n";}
	}
  echo "</tr> \n"; 
}
echo "</tbody> \n </table> \n"; 
 }




mysql_close($dblink);
?> </div>
<p>
<a href="#" id="ocultar">Ocultar host_7235397_horarios</a> | 
<a href="#" id="mostrar">Mostrar host_7235397_horarios</a> 
</p>
</body>

</html>