<?php session_start();
if(isset($_SESSION["Legajo"])){
			
			if ($_SESSION["admin"] == "No"){
				header("Location:index.php");
			}
}

if ($_GET['grupo'] != ''){
							$grupo_activo = $_GET['grupo'];
							$grupos =  $_SESSION["grupo"];
						 }else {
						 $grupos =  $_SESSION["grupo"]; 
						 $grupo_activo = $grupos; 
						 }

if ($_SESSION["admin"] == "Si"){
                                
				echo "<div style='position: absolute; top: -94px; left: -76px;'><a id='admin' href = 'ajax_jquery.php?page=mostrar_plantilla.php'>Volver al panel de vista</a></div>";}


include_once("crear_plantilla.php");
include("dbconnect.php");
sleep(3);
$mes_alt = $_GET['mes'];//trae el mes solicitado
$year = date("Y");
	if ($mes_alt == 13){
		$mes = 1;
		$year = $year + 1;
		}else if ($mes_alt == 14) {
			$mes = 2;
			$year = $year + 1;
			}else if($mes_alt == 15){
					$mes = 3;
					$year = $year + 1;
					}else {$mes = $mes_alt;}

$tabla_mes = $mes.$year; //forma el nombre de la tabla con el mes y el año en curso


//primer consulta
$sql_statement = "SELECT * FROM  `$tabla_mes` LIMIT 0 , 300";
$respuesta = mysql_query($sql_statement,$db);

if (!$respuesta) {//si no existe la tabla se crea
	$t = new Create_table();
	$t->create($tabla_mes, $mes, $year);
	
}
 

$resultado = mysql_query("SELECT * FROM  `$tabla_mes`", $db);
$cant_fil = mysql_num_rows($resultado);

if ($cant_fil == 0) {
    echo "No se han encontrado filas, nada a imprimir, asi que voy " .
         "a detenerme.";
    exit;
} else{
$width = 110 + (24 * (cal_days_in_month(CAL_GREGORIAN,$mes,$year)) + 150);


$grupo = array ('Front','Prestacion','Vip','Movil','Back','Responsable','PYMES');

$url = "http://www.telecomlead.com/wp-content/uploads/2013/02/Telecom_Argentina_logo.png";
echo "<div id='inicio' style='width: 900px; height: 400px; background-image: url($url); background-repeat:no-repeat; background-position: 360px;'></div> ";
for ($g = 0 ; $g < 7 ; $g++ ){
echo "<div id='$grupo[$g]' style='width:  ".$width."px;  '><form style='margin:0'>";

echo "<table border = '0' id = 'table1' class = 'grid'> ";

//Mostramos los nombres de las tablas

echo "\n <thead> \n <tr> \n";

mysql_field_seek($resultado,0);

while ($field = mysql_fetch_field($resultado)){
		if ($field->name == 'Nombre'){
			echo "<th id='primer_col_iz'><b>$field->name</b></th> \n";
			}else if ($field->name == cal_days_in_month(CAL_GREGORIAN,$mes,$year)){
				echo "<th ><b>$field->name</b></th> \n";
			      }else if ($field->name == 'Fr'){
					echo "<th id='primer_col_der'><b>$field->name</b></th> \n";
					  }	else if ($field->name == 'Vac'){
						  }	else {
					  echo "<th><b>$field->name</b></th> \n";
					  }
}

echo "</tr> \n  </thead> \n ";
// Mientras exista una fila de datos, colocar esa fila en $fila
// como una matriz asociativa

$columnas = mysql_num_fields($resultado)-1; 
echo "<tfoot><tr><td id='foot' colspan='$columnas' > Horarios CCGC </td></tr></tfoot>\n"; 
$num_fil = 1;
if ($grupo[$g] == 'Prestacion'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Prestacion' ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Vip'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Externos' OR `Grupo` = 'Service Manager' ORDER BY Grupo DESC, Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Front'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Front'  ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Back'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Back'   ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Movil'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Movil' ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Responsable'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Responsable' ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'PYMES'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'PYMES' ORDER BY Apellido ASC LIMIT 0 , 300";
	}

$result_emp = mysql_query($sql_emp,$db);
while ($fila_emp = mysql_fetch_array($result_emp)) {
	
   //calculo de francos acumulados	
  $FrAnioAnt = $fila_emp[7];
  $FrAnioActual = $fila_emp[8];
  $FrTotal =   $FrAnioAnt + $FrAnioActual; 
  
  $sql_fila = "SELECT * FROM  `$tabla_mes` WHERE `Nombre` = '$fila_emp[0]' LIMIT 0 , 300";
  
  $result_fila = mysql_query($sql_fila,$db);
  $fila = mysql_fetch_array($result_fila);
  switch($mes){ case 1 : $mes_palabra = "Enero"; 
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
  
											
  if ( $fila[0]!= null){
	   echo "<tbody> \n <tr class='fila'> \n"; 
    for ($i=0; $i<$columnas; $i++){
					
		if ($i == $columnas-1){ 
											echo "<td  class='back'>".$FrTotal."</td> \n";
							}
			else if ($fila[$i] == 'FS')
			{	echo "<td  class='franco'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
					}else if ($fila[$i] == 'V'){
						echo "<td  class='vacas'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'LM'){
						echo "<td  class='LicMed'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'D'){
						echo "<td  class='donar'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'N'){
						echo "<td  class='natalicio'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'LE'){
						echo "<td  class='LicExam'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'LN'){
						echo "<td  class='nacimiento'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'C'){
						echo "<td  class='curso'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'M'){
						echo "<td  class='muda'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'FI'){
						echo "<td  class='FraInt'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'LF'){
						echo "<td  class='fallecimiento'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'LC'){
						echo "<td  class='casamiento'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'T'){
						echo "<td  class='teletrabajo'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'FA'){
						echo "<td  class='franco_adicional'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'B'){
						echo "<td  class='banco'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($fila[$i] == 'R'){
						echo "<td  class='reemplazo'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if(jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes ,$i, $year) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes ,$i, $year) , 1 ) == "Saturday"){
								echo "<td class='finde'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else if ($i == 0 ){
										echo "<td id='col_nombre'>" .$fila[$i]."</td> \n";
							}else if($i != 0 && ($i == $feriado[1] || $i == $feriado[2] || $i == $feriado[3] || $i == $feriado[4] || $i == $feriado[5])){
									echo "<td class='finde'><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
							}else {	echo "<td><input type='text' name='celda$num_fil-$i' value='$fila[$i]' maxlength='2' style='width:17px; border: 1px solid #FFFFCC; padding: 0px; margin: 0px'></td> \n";
																	}
		}
		echo "</tr> \n";
  }
	  
	$num_fil++;
	}
	echo "</tbody> \n </table> \n";
	//$height = (($num_fil + 1) * 25.15);
	echo "<input type='hidden' name='columnas' value='$columnas'><input type='hidden' name='tabla' value='$tabla_mes'><input type='hidden' name='mes' value='$mes'></form>";
    //echo "<script> $('#$grupo[$g]').css({height:'$height'}); </script>";
	echo "</div>";
		}
	 
}



mysql_close($db);
?>


<div class="menu_options"><a class="grupos" href="#" title="Grupos"><img src="groups.png" /></a><a href="crear_usuario.php?grupos=<?php echo $grupos; ?>" title="Editar"><img src="db-upload.png"></img></a><a href="feriados_planilla.php?grupos=<?php echo $grupos; ?>" rel="#feriados" title="Feriados"><img src="calendar.png"></img></a><a href="reporte_excel.php?tabla_mes=<?php echo $tabla_mes; ?>&mes=<?php echo $mes; ?>" title="Reporte Excel"><img src="excel.png"></img></a><a href="reporte_excel_anioAnt.php" title="Reporte Excel Anterior"><img src="excel_anioAnt.png"></img></a><a id="botonera"  href="#" title="Grabar"><img src="save.png" /></a><a id="guardar" style="display:none;"><img src="save-loader.gif"/></a>
</div>


<div class="menu_otros">
<ul>
																	<li class="Front"><a href="#">Front</a></li>
																	<li class="Back"><a href="#">Back</a></li>
																	<li class="Vip"><a href="#">Vip</a></li>
																	<li class="Prestacion"><a href="#">Prestacion</a></li>
																	<li class="Movil"><a href="#">Movil</a></li>
																	<li class="Responsable"><a href="#">Responsables</a></li>
																	<li class="PYMES"><a href="#">PYMES</a></li>
                                                                    
																</ul>
						</div>

<!-- overlayed element -->
<div class="overlay_feriado" id="feriados" style="position:absolute;">

	<!-- the external content is loaded inside this tag -->
	<div class="contentWrapFeriado"></div>

</div>
<table width="20" border="0" style="top: 0px; position: absolute; left: 1024px;">
    <tr>
     <tr> <td class="FraInt" style="border:1px solid black;" title="FRANCO INTERNO">FI</td></tr>
      <tr><td class="donar" style="border:1px solid black;" title="DONACION">D</td></tr>
      <tr><td class="natalicio" style="border:1px solid black;" title="CUMPLEAÑOS">N</td></tr>
      <tr><td class="LicExam" style="border:1px solid black;" title="LICENCIA X EXAMEN">LE</td></tr>
      <tr><td class="LicMed" style="border:1px solid black;" title="LICENCIA MEDICA">LM</td></tr>
      <tr><td class="curso" style="border:1px solid black;" title="CURSO">C</td></tr>
     <tr> <td class="muda" style="border:1px solid black;" title="MUDANZA">M</td></tr>
      <tr><td class="nacimiento" style="border:1px solid black;" title="LICENCIA X NACIMIENTO">LN</td></tr>
      <tr><td class="casamiento" style="border:1px solid black;" title="LICENCIA X CASAMIENTO">LC</td></tr>
      <tr><td class="franco" style="border:1px solid black;" title="FRANCO SEMANAL" >FS</td></tr>
      <tr><td class="vacas" style="border:1px solid black;" title="VACACIONES">V</td></tr>
      <tr><td class="fallecimiento"  style="border:1px solid black;" title="LICENCIA X FALLECIMIENTO">LF</td></tr>
	  <tr><td class="teletrabajo"  style="border:1px solid black;" title="TELETRABAJO">T</td></tr>
	  <tr><td class="banco"  style="border:1px solid black;" title="BANCO">B</td></tr>
	  <tr><td class="franco_adicional"  style="border:1px solid black;" title="FRANCO ADICIONAL">FA</td></tr>
	  <tr><td class="reemplazo"  style="border:1px solid black;" title="REEMPLAZO">R</td></tr>
	  <tr><td class="pasiva"  style="border:1px solid black;" title="GUARDIA PASIVA">P</td></tr>
     
    
</table>

<script>
$(document).ready(function() {
 $("a[rel]").overlay({
		fixed: false,
		left: "center",
		closeOnEsc: true,
		onBeforeLoad: function() {
 
            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrapFeriado");
 
            // load the page specified in the trigger
            wrap.load(this.getTrigger().attr("href"));
        }
		});
}); 
$(function(){
$("#botonera").click(function(evento) {
  var link = $('#<?php echo $grupo_activo; ?> form').serialize();
  
   $.ajax({
     type: 'POST',
     url: 'update.php',
     data: 'grupo=<?php echo $grupo_activo; ?>&'+link,
     success: function(){  $("#guardar").show('slow').delay(1000).hide('slow');  }
  
       });
   
	return false;
 });
});
$(function(){
  $('.grid tr').bind('mouseenter mouseleave', function() {
       $(this).toggleClass('over');
  })

});
$(function(){
  $('.grupos').click( function() {
	   	   $('.menu_otros').toggleClass('expand');
  })


});

$(function(){
$('.menu_otros li').one('click',function() {
	var CurrentClass = $(this).attr('class'); 
			
			
			$("#cargando").css("display", "inline");
			$("#destino2").css("display", "none");
			$("#destino2").load("cargar_plantilla.php?grupo="+CurrentClass+"&mes=<?php echo $mes_alt; ?>", function(){
			$("#cargando").css("display", "none");
			$("#destino2").css("display", "inline");
			$("#inicio").addClass("hide");		
			 
		});
		return false;
	})
});



var i=0; var grupos = ['Front','Prestacion','Vip','Movil','Responsable','Back','PYMES'];
for (i = 0; i < 7 ; i++){
var grupo_activo = '<?php echo $grupo_activo ?>'; 
	if (  grupo_activo != grupos[i] ){
		
		$("#" + grupos[i]).addClass("hide");
		
	}else {$("#inicio").addClass("hide");}
}

</script>
