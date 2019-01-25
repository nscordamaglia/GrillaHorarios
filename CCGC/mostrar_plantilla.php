<?php session_start();

if ($_SESSION["admin"] == "Si"){
                                
				echo "<div style='position: absolute; top: -94px; left: -76px;'><a id='admin' href = 'ajax_jquery.php?page=cargar_plantilla.php'>Panel de Administracion</a></div>";}

$legajo = $_SESSION["Legajo"];
$grupo_activo =  $_SESSION["grupo"];

/*if ($_GET['grupo'] == ''){ 
	if($_SESSION["grupo"]== 'Back'){
			$grupo_activo = 'Front';
		}else if($_SESSION["grupo"]== 'D. de Servicio' ){
					$grupo_activo = 'Vip';
				}else if($_SESSION["grupo"]== 'Externos'){
									$grupo_activo = 'Vip';
								}else if($_SESSION["grupo"]== 'Service Manager'){
									$grupo_activo = 'Vip';
										}else{
										
											$grupo_activo = $_SESSION["grupo"];
										}

}*/
?>



		 	 

<script>



</script>

	</head>



<body>







<?php 

$mes = $_GET['mes'];

$year = date("Y");
if ($mes == 13){
		$mes = 1;
		$year = $year + 1;
		}else if ($mes == 14) {
			$mes = 2;
			$year = $year + 1;
			}else if($mes == 15){
					$mes = 3;
					$year = $year + 1;
			}
$tabla_mes = $mes.$year; 


include("dbconnect.php");




$sql_statement = "SELECT * FROM  `$tabla_mes` LIMIT 0 , 300";

$resultado = mysql_query($sql_statement,$db);







$resultado = mysql_query($sql_statement,$db);



if (!$resultado) {

    echo "<div style='display:block; text-align:center; padding-top:20%; padding-left:60%;'><img src='proximamente.gif'></img></div>";

    exit;

}

$cant_fil = mysql_num_rows($resultado);

if ($cant_fil == 0) {

    echo "No se han encontrado filas, nada a imprimir, asi que voy " .

         "a detenerme.";

    exit;

} else{





$grupo = array ('Front','Prestacion','Vip','Movil','Back','Responsable','PYMES');
$url = "http://www.telecomlead.com/wp-content/uploads/2013/02/Telecom_Argentina_logo.png";
echo "<div id='inicio' style='width: 900px; height: 400px; background-image: url($url); background-repeat:no-repeat; background-position: 360px;'></div> ";
for ($g = 0 ; $g < 7 ; $g++ ){


echo "<div id='$grupo[$g]'><table border = '0' id = 'table1' class = 'grid'> ";



//Mostramos los nombres de las tablas



echo "\n <thead> \n <tr> \n";



mysql_field_seek($resultado,0);



while ($field = mysql_fetch_field($resultado)){

		if ($field->name == 'Nombre'){

			echo "<th id='primer_col_iz'><b>$field->name</b></th> \n";

			}else if ($field->name == cal_days_in_month(CAL_GREGORIAN,$mes,$year)){

				echo "<th id='primer_col_der'><b>$field->name</b></th> \n";

			      }else if ($field->name == 'Fr'){

					  }else if ($field->name == 'Vac'){

							}else {

									echo "<th><b>$field->name</b></th> \n";

									}

}



echo "</tr> \n  </thead> \n ";

// Mientras exista una fila de datos, colocar esa fila en $fila

// como una matriz asociativa



$columnas = mysql_num_fields($resultado)-2;

echo "<tfoot><tr><td id='foot' colspan='$columnas' >Horarios CCGC </td></tr></tfoot>\n"; 

$num_fil = 1;

if ($grupo[$g] == 'Prestacion'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Prestacion' ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Vip'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Externos' OR `Grupo` = 'Service Manager'  ORDER BY Grupo DESC, Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Front'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Front'  ORDER BY Grupo DESC, Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Back'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE  `Grupo` = 'Back'  ORDER BY Apellido ASC LIMIT 0 , 300";
	}else if ($grupo[$g] == 'Movil'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Movil' ORDER BY Apellido ASC LIMIT 0 , 300";
	}
	else if ($grupo[$g] == 'Responsable'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'Responsable' ORDER BY Apellido ASC LIMIT 0 , 300";
	}
	else if ($grupo[$g] == 'PYMES'){
		$sql_emp = "SELECT * FROM  `empleados` WHERE `Grupo` = 'PYMES' ORDER BY Apellido ASC LIMIT 0 , 300";
	}



$result_emp = mysql_query($sql_emp,$db);

while ($fila_emp = mysql_fetch_array($result_emp)) {

	

  	

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

  if ($legajo == $fila_emp[2]){
			echo "<tbody> \n <tr class='fila$num_fil over'> \n"; 
			}else{
				echo "<tbody> \n <tr class='fila$num_fil'> \n"; 
				} 

    for ($i=0; $i<$columnas; $i++){

	

		if ($fila[$i] == 'FS')

		{	echo "<td  class='franco' title='FRANCO SEMANAL'>".$fila[$i]."</td> \n";

				}else if ($fila[$i] == 'V'){

					echo "<td  class='vacas' title='VACACIONES'>" .$fila[$i]."</td> \n";

						}else if ($fila[$i] == 'LM'){

						echo "<td  class='LicMed' title='LICENCIA MEDICA'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'D'){

						echo "<td  class='donar' title='DONAR SANGRE'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'N'){

						echo "<td  class='natalicio' title='CUMPLEAÑOS'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'LE'){

						echo "<td  class='LicExam' title='LICENCIA X EXAMEN'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'LN'){

						echo "<td  class='nacimiento' title='LICENCIA X NACIMIENTO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'C'){

						echo "<td  class='curso' title='CURSO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'M'){

						echo "<td  class='muda' title='MUDANZA'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'FI'){

						echo "<td  class='FraInt'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'LF'){

						echo "<td  class='fallecimiento' title='LICENCIA X FALLECIMIENTO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'LC'){

						echo "<td  class='casamiento' title='LICENCIA X CASAMIENTO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'T'){

						echo "<td  class='teletrabajo' title='TELETRABAJO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'FA'){

						echo "<td  class='franco_adicional' title='FRANCO ADICIONAL'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'B'){

						echo "<td  class='banco' title='BANCO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'R'){

						echo "<td  class='reemplazo' title='REEMPLAZO'>".$fila[$i]."</td> \n";

							}else if ($fila[$i] == 'P'){

						echo "<td  class='pasiva' title='GUARDIA PASIVA'>".$fila[$i]."</td> \n";

							}else if((jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,$i, $year) , 1 ) == "Sunday" || jddayofweek( cal_to_jd(CAL_GREGORIAN, $mes,$i, $year) , 1 ) == "Saturday") || ($i != 0 && ($i == $feriado[1] || $i == $feriado[2] || $i == $feriado[3] || $i == $feriado[4] || $i == $feriado[5])))
							{
								echo "<td class='finde'>" .$fila[$i]."</td> \n";
										/*if($fila_emp['Grupo'] == 'Back'){
												if ($fila[0] == 'Claros' ) {
									if ($i < 0){
										
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td class='finde'>" .$fila[$i]."</td> \n";}
									}else if ($fila[0] == 'Vazquez'){
										if ($i < 16){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
											}else {echo "<td class='finde'>" .$fila[$i]."</td> \n";}
										}else if ($fila[0] == 'Daponte'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td class='finde'>" .$fila[$i]."</td> \n";}
											}else if ($fila[0] == 'Suarez'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td class='finde'>" .$fila[$i]."</td> \n";}
											}else if ($fila[0] == 'Rey'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td class='finde'>" .$fila[$i]."</td> \n";}
											}
											
										}else{echo "<td class='finde'>" .$fila[$i]."</td> \n";}*/

								}/*else if($i != 0 && ($i == $feriado[1] || $i == $feriado[2] || $i == $feriado[3] || $i == $feriado[4] || $i == $feriado[5])){

									echo "<td class='finde'>" .$fila[$i]."</td> \n";

								}*/else if ($i == 0 ){

									echo "<td id='col_nombre'>" .$fila[$i]."</td> \n";

								}

									else {	

											if ($fila[$i] == 6 ){								

								echo "<td style='color:#00F'>" .$fila[$i]."</td> \n";								

							}else if ($fila[$i] == 23 ){								

								echo "<td style='font-weight: bold; border: 1px solid black;'>" .$fila[$i]."</td> \n";								

							}else if ($fila[$i] == 15 || $fila[$i] == 12){								

								echo "<td style='color:#F00'>" .$fila[$i]."</td> \n";								

							}/*else if ($fila_emp['Grupo'] == 'Back'){
								if ($fila[0] == 'Soto' ) {
									if ($i < 0){
										
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td>" .$fila[$i]."</td> \n";}
									}else if ($fila[0] == 'Vazquez'){
										if ($i < 16 ){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
											}else {echo "<td>" .$fila[$i]."</td> \n";}
										}else if ($fila[0] == 'Daponte'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td>" .$fila[$i]."</td> \n";}
											}else if ($fila[0] == 'Suarez'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td>" .$fila[$i]."</td> \n";}
											}else if ($fila[0] == 'Rey'){
											if ($i > 15){
										echo "<td class='back'>" .$fila[$i]."</td> \n";
										
										}else {echo "<td>" .$fila[$i]."</td> \n";}
											}
								

								}*/else{

								echo "<td>" .$fila[$i]."</td> \n";}

											}

	}

  echo "</tr> \n";

$num_fil++;

}

echo "</tbody> \n </table> \n"; 
echo "</div>";
}

 }



$sql_info = "SELECT `Apellido`, `FrAnioAnt`, `FrAnioActual` FROM `empleados` WHERE `Legajo` = '$legajo' LIMIT 0 ,300";

$result_info = mysql_query($sql_info,$db);

$fila_info = mysql_fetch_array($result_info);

$nombre = $fila_info[0];

$FrAnioAnt = $fila_info[1];

$FrAnioActual = $fila_info[2];

$FrTotal =   $FrAnioAnt + $FrAnioActual;

	

	



mysql_close($db);

?> 



<div class="menu_options">		
        <a class="otros_grupos" href="#"><img src="groups.png" /></a>
        <a href="info.html" rel="#info" style="text-decoration:none"><img src="info.png"  width="60" height="60"/></a>
</div>

<div class="simple_overlay" id="info" style="position:absolute;">

	<!-- external page -->
	<div class="contentWrap"></div>

	
</div>
<script>
$(document).ready(function() {
 $("a[rel]").overlay({
		fixed: false,
		left: "center",
		closeOnEsc: true,
		onBeforeLoad: function() {
 
            // grab wrapper element inside content
            var wrap = this.getOverlay().find(".contentWrap");
 
            // load the page specified in the trigger
            wrap.load(this.getTrigger().attr("href"));
        }
		});
}); 
</script>
<div id="info_franco"><?php  $grupo_user =  $_SESSION["grupo"]; echo "Usuario: $nombre / Grupo: $grupo_user  - tiene $FrTotal francos disponibles."; ?></div> 

                        
						<div class="menu_otros">
																<ul>
																	<li class="Front"><a href="#">Front</a></li>
																	<li class="Back"><a href="#">Back</a></li>
																	<li class="Vip"><a href="#">Vip</a></li>
																	<li class="Prestacion"><a href="#">Prestacion<a/></li>
																	<li class="Movil"><a href="#">Movil</a></li>
																	<li class="Responsable"><a href="#">Responsables</a></li>
																	<li class="PYMES"><a href="#">PYMES</a></li>
																	
																</ul>
						</div>

<script type="text/javascript">
var grupo_activo = '<?php echo $grupo_activo ?>'; 

		var i=0; var grupos = ['Front','Prestacion','Vip','Movil','Back','Responsable','PYMES'];
		function activar(){
		for (i = 0; i < 7 ; i++){

			if (  grupo_activo != grupos[i] ){
				
				$("#" + grupos[i]).addClass("hide");
				
			} else {$("#inicio").addClass("hide");}
		}

}
$(document).ready(function(){
	activar();
});
$(function(){
  $('.otros_grupos').click( function() {
	   	   $('.menu_otros').toggleClass('expand');
  })


});

$('.menu_otros li').click(function() {
		var CurrentClass = $(this).attr('class');  
		$("#" + CurrentClass).removeClass('hide');
		
		
		var i=0; var grupos = ['Front','Prestacion','Vip','Movil','Back','Responsable','PYMES'];
		grupo_activo = CurrentClass; 
		<?php $_SESSION['grupo_activo'] = "<script> document.write(grupo_activo) </script>"; ?>
		activar();


});


$(function(){

  $('.grid tr ').bind('mouseenter mouseleave', function() {

       $(this).toggleClass('over');

  })



});
</script>





