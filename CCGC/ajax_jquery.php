<?php session_start();

if(isset($_SESSION["Legajo"]))
{	
		
	echo "<div class='header' style='width:100%; height:35px; margin:0px;'><div id='logout'><a href = 'logout.php'>Cerrar sesion de " . $_SESSION["Legajo"]. "<img src='cerrar_ventana.gif'></img></a></div><div id='actualizado'> Ultima actualizacion: ".$_SESSION["actua"]."</div><div id='titulo_mes'></div></div> " ;
}
else{
header("Location:index.php");
} 
$legajo = $_SESSION["Legajo"];
$page = $_GET['page']; 
$_SESSION['grupo_activo'] = $_SESSION['grupo'];


 ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"> 
 
<html><head> 
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<title>Horarios CCGC</title>
<link rel="stylesheet" type="text/css" href="imprimir.css" media="print" /> 
	 	  <style type="text/css" media="all">
		  	.land{
				
				}
 			a, img { text-decoration:none; border:0px; font-family:"Arial";}
			.franco {
				font-family:"Arial";
				font-weight:bold;
				background-color:#66CC33;
					}
					div {border:0px solid white;}
			.vacas {
				font-family:"Arial";
				font-weight:bold;
				background-color:#FFFF99;
			}
			.LicMed {
				font-family:"Arial";
				font-weight:bold;
				background-color:#C0C0C0;
					}
			.donar {
				font-family:"Arial";
				color:#60C;
				font-weight:bold;
				background-color:#FF66FF;
					}
			.natalicio {
				font-family:"Arial";
				font-weight:bold;
				background-color:#CC99FF;
					}
			.LicExam {
				font-family:"Arial";
				font-weight:bold;
				background-color:#FFCCFF;
					}
			.nacimiento {
					font-family:"Arial";
					font-weight:bold;
					color:#10891A;
					background-color:#E6FFE8;
					}
			.curso {
				font-family:"Arial";
				font-weight:bold;
				background-color:#FF9900;
					}
			.muda {
				font-family:"Arial";
				font-weight:bold;
				color:#900;
				background-color:#FFFFFF;
					}
			.FraInt {
				font-family:"Arial";
				font-weight:bold;
				background-color:#66CC33;
					}
			.finde {
				font-family:"Arial";
				font-weight:bold;
				background-color:#66CCFF;
			}
			.back {
				
				//background-color:#a0F4ba;
				
			}
			.fallecimiento{
				font-family:"Arial";
				background-color:#00EAAA;
				font-weight:bold;
				color:#FFF;
			}
			.casamiento{
				font-family:"Arial";
				background-color:#88EAAA;
				font-weight:bold;
				color:#FFF;
			}
			.teletrabajo{
				font-family:"Arial";
				background-color:#FC6;
				font-weight:bold;
				color:#F36;
			}
			.banco{
				font-family:"Arial";
				background-color:#5882FA;
				font-weight:bold;
				color:#FFF;
			}
			.franco_adicional{
				font-family:"Arial";
				background-color:#693;
				font-weight:bold;
				color:#CCC;
			}
			.reemplazo{
				font-family:"Arial";
				background-color:#232693;
				font-weight:bold;
				color:#CCC;
			}
			.pasiva{
				font-family:"Arial";
				background-color:#735693;
				font-weight:bold;
				color:#CCC;
			}
			th {
				/*border: 1px solid #235fab;
				border-radius: 10px;*/
				text-align: center;
				width: 24px;
				background-color:#235fab;
			}
			td {
			/*border: 1px solid #FFFFCC;
						border-radius: 10px;*/
						text-align: center;
			width: 24px; height: 18px;
			padding: 2px 2px 2px 2px;
					   text-align-center;
			background-color:#FFF;
					}
			.table {
					table-layout:fixed;
					}
			
			#Front, #Prestacion, #Vip, #Movil, #Responsable, #ICT, #Back, #PYME {
					background-color: #CDD8FE;
					border: 1px solid #235FAB;
					border-radius: 10px 10px 10px 10px;
					font-family: "Arial";
					margin: 0;
					padding: 0;
					position: relative;
					top: -21px;
							}
			.hide{
				display:none;
			
			}
		
							
			#primer_col_iz {
								border: 1px solid #235fab;
								border-radius: 10px 0px 0px 0px;
								-moz-border-radius: 10px 0px 0px 0px;
								-webkit-border-radius: 10px 0px 0px 0px;
								behavior: url(Pie/PIE.htc);
								
								
						}
			#primer_col_der {
								border: 1px solid #235fab;
								border-radius: 0px 10px 0px 0px;
								-moz-border-radius: 0px 10px 0px 0px;
								-webkit-border-radius: 0px 10px 0x 0px;
								behavior: url(Pie/PIE.htc);
							}
			
			#foot {
						text-align: center;
						background-color: #235fab;
						border: 1px solid #235fab;
						border-radius: 0px 0px 10px 10px;
						-moz-border-radius: 0px 0px 10px 10px;
						-webkit-border-radius: 0px px 10px 10px;
						behavior: url(Pie/PIE.htc);
						}
			#col_nombre {
							text-align: left;
							width:110px;
							
						}
			.grid tr.over td
							{
								background: #bcd4ec;
							}
			#menu_mes span.over
								{
									background: #bcd4ec;
								}

			#menu_mes span {
								border: 1px solid black;
								border-radius: 5px;
								-moz-border-radius: 5px 5px 0px 0px;
								-webkit-border-radius: 5px 5px 0px 0px;								
								padding: 3px;	
								margin: 0px;
								background-color:#ECF8E0;
								cursor:pointer;
								behavior: url(Pie/PIE.htc);
							}
			#menu_mes  {
								font-family: "Arial";
								height: 22px;
								padding-left: 185px;
								width: 100%;
								position: absolute;
								top: 61px;
								
								
							}
			#menu_anioprx span.over
								{
									background: #00E123;
								}

			#menu_anioprx span {
								border: 1px solid black;
								border-radius: 5px;
								-moz-border-radius: 5px 5px 0px 0px;
								-webkit-border-radius: 5px 5px 0px 0px;								
								padding: 3px;	
								margin: 3px;
								background-color:#EEEA12;
								cursor:pointer;
								behavior: url(Pie/PIE.htc);
							}
			#menu_anioprx  {
								font-family: "Arial";
								left: 783px;
								position: relative;
								top: -19px;
								width:50px
								
							}
			#submenu_anioprx span.over
								{
									background: #00E123;
								}

			#submenu_anioprx span {
								border: 1px solid black;
								border-radius: 5px;
								-moz-border-radius: 5px 5px 0px 0px;
								-webkit-border-radius: 5px 5px 0px 0px;								
								padding: 3px;	
								margin: 3px;
								background-color:#EEEA12;
								cursor:pointer;
								behavior: url(Pie/PIE.htc);
							}
			#submenu_anioprx  {
								position: absolute;
								left: 1010px;
								top: 61px;
								font-family:"Arial";
								display:none;
							}
			#pulsado{
										
				background: #bcd4ec;
				}
			#sin_pulsar {
				background-color:#66FF66;
			}
			#titulo_mes{
				
				font-family:"Arial";
				font-size:24px;
				font-weight:bold;
				float:right;
				width:30%;
			}
			#actualizado{
				
				font-family:"verdana";
				font-size: 10px;
				float:right;
				width:30%;
				
				
			}
			#logout{
				
				font-family:"verdana";
				font-size: 10px;
				float:left;
				width:30%;
				text-align: center;
				
				
			}
			#info_franco{
				font-family:"Arial";
				font-weight:bold;	
			}
			
			.menu_otros{
				display:none;
				left: -20px;
				position: relative;
				top: 0px;
				width:35%;
				
			}
			.expand{
				display:inline;
			}
			.otros_grupos{
				position:relative;
				top:-8px;	
				width:5%;				
			}
			.menu_options{
			
					left: 0px;
					position: relative;
					top: 0px;
					width: 35%;
			
			}
			#botonera{
			
					
			
			}
			.info_bottom{
					left: 77px;
					position: relative;
					top: -13px;
					width: 5%;
			
			
			}
			
			/* the overlayed element */
			.simple_overlay {
					
					/* must be initially hidden */
					display:none;
					
					/* place overlay on top of other elements */
					z-index:10000;
					
					/* styling */
					background-color:#333;
					
					height: 275px;
    				width: 576px;
					border:1px solid #666;
					
					/* CSS3 styling for latest browsers */
					-moz-box-shadow:0 0 90px 5px #000;
					-webkit-box-shadow: 0 0 90px #000;	
				}

				/* close button positioned on upper right corner */
			.simple_overlay .close {
					background-image:url(close.png);
					position:absolute;
					right:-15px;
					top:-15px;
					cursor:pointer;
					height:35px;
					width:35px;
				}
				
			.overlay_feriado {
					
					/* must be initially hidden */
					display:none;
					
					/* place overlay on top of other elements */
					z-index:10000;
					
					/* styling */
					background-color:#333;
					
					height: 437px;
    				width: 280px;
					border:1px solid #666;
					
					/* CSS3 styling for latest browsers */
					-moz-box-shadow:0 0 90px 5px #000;
					-webkit-box-shadow: 0 0 90px #000;
					-moz-border-radius: 10px 10px 10px 10px;
					-webkit-border-radius: 10px 10px 10px 10px;	
				}

				/* close button positioned on upper right corner */
			.overlay_feriado .close {
					background-image:url(close.png);
					position:absolute;
					right:-15px;
					top:-15px;
					cursor:pointer;
					height:35px;
					width:35px;
				}
			/* use a semi-transparent image for the overlay */
			
				
				/* container for external content. uses vertical scrollbar, if needed */
				div.contentWrapFeriado {
					height:437px;
					overflow-y:hidden;
				}
				div.contentWrap {
					height:275px;
					overflow-y:hidden;
				}
				#guardar {
					
					
					cursor:pointer;
					height:35px;
					width:35px;
				}
				


			 
		</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.0/jquery.min.js"></script>	
<script src="/jquery/jquery.tools.min.js" type="text/javascript"></script>
<script> 

$(document).ready(function(){
	
	$("#menu_mes span").click(function(evento){
		evento.preventDefault();
		$('#submenu_anioprx').css('display','none');
		$("#cargando").css("display", "inline");
		$("#destino2").css("display", "none");
		var eleccion = this.className;
		
		var mes;
		var fecha=new Date();
		var anio = fecha.getFullYear();
		switch ( eleccion) {    case 'enero over':
								{mes = 1;
								$("#titulo_mes").html("Enero "+anio);
									break;}
							    case 'febrero over':
								{ mes = 2;
								$("#titulo_mes").html("Febrero "+anio);
									break;}	
								case 'marzo over':
								{ mes = 3;
								$("#titulo_mes").html("Marzo "+anio);
									break;}
									case 'abril over':
								{ mes = 4;
								$("#titulo_mes").html("Abril "+anio);
									break;}
									case 'mayo over':
								{ mes = 5;
								$("#titulo_mes").html("Mayo "+anio);
									break;}
									case 'junio over':
								{ mes = 6;
								$("#titulo_mes").html("Junio "+anio);
									break;}
									case 'julio over':
								{ mes = 7;
								$("#titulo_mes").html("Julio "+anio);
									break;}
									case 'agosto over':
								{ mes = 8; 
								$("#titulo_mes").html("Agosto "+anio);
									break;}
									case 'septiembre over':
								{ mes = 9;
								$("#titulo_mes").html("Septiembre "+anio);
									break;}
									case 'octubre over':
								{ mes = 10;
								$("#titulo_mes").html("Octubre "+anio);
									break;}
									case 'noviembre over':
								{ mes = 11;
								$("#titulo_mes").html("Noviembre "+anio);
									break;}
									case 'diciembre over':
								{ mes = 12;
								$("#titulo_mes").html("Diciembre "+anio);
									break;}
									case 'anioprx over':
								{ 
								$("#titulo_mes").html(anio + 1);
									break;}
							}
							
		$("#destino2").load("<?php echo $page; ?>?grupo=<?php echo $_SESSION['grupo_activo']; ?>&mes=" + mes, function(){
			$("#cargando").css("display", "none");
			$("#destino2").css("display", "inline");
		});
		return false;
	});
});


$(document).ready(function(){
			$('#submenu_anioprx').css('display','none');
			var fecha=new Date();
			var mes_actual = fecha.getMonth() + 1;
			var anio = fecha.getFullYear();
			switch (mes_actual){
				case 1:{
					titulo = "Enero "+ anio;
					break;}
				case 2:{
					titulo = "Febrero "+ anio;
					break;}
				case 3:{
					titulo = "Marzo "+ anio;
					break;}
				case 4:{
					titulo = "Abril "+ anio;
					break;}
				case 5:{
					titulo = "Mayo "+ anio;
					break;}
				case 6:{
					titulo = "Junio "+ anio;
					break;}
				case 7:{
					titulo = "Julio "+ anio;
					break;}
				case 8:{
					titulo = "Agosto "+ anio;
					break;}
				case 9:{
					titulo = "Septiembre "+ anio;
					break;}
				case 10:{
					titulo = "Octubre "+ anio;
					break;}
				case 11:{
					titulo = "Noviembre "+ anio;
					break;}
				case 12:{
					titulo = "Diciembre "+ anio;
					break;}	
				
			}
			$("#cargando").css("display", "inline");
			$("#destino2").css("display", "none");
			$("#destino2").load("<?php echo $page."?grupo=". $_SESSION['grupo_activo'] ."&mes="?>" + mes_actual, function(){
			$("#cargando").css("display", "none");
			$("#destino2").css("display", "inline");
			$("#titulo_mes").html(titulo);
		});  
		return false;
});



</script> 
</head> 
 
<body class="land"> 
 
<div class="grill_box">
	<div id="destino1" style="display:none"></div>

	<div id="menu_mes" class="menu">
		<span class="enero">Enero</span>
		<span class="febrero">Febrero</span>
		<span class="marzo">Marzo</span>
		<span class="abril">Abril</span>
		<span class="mayo">Mayo</span>
		<span class="junio">Junio</span>
		<span class="julio">Julio</span>
		<span class="agosto">Agosto</span>
		<span class="septiembre">Septiembre</span>
		<span class="octubre">Octubre</span>
		<span class="noviembre">Noviembre</span>
		<span class="diciembre">Diciembre</span>
		<span class="anioprx"><?php $anio_actual = date('Y'); echo $anio_actual + 1; ?></span>
	</div>

					<div id="submenu_anioprx" ><span class="eneroprx">Enero</span><span class="febreroprx">Febrero</span><span class="marzoprx">Marzo</span>
					</div>
		
	 
	<div id="destino2" style="display: inline; cursor: pointer;  position: absolute; left: 84px; top: 102px;">
		
	</div>
	<div id="cargando" style="display:none; position:absolute; left:45%; top:45%; "><img src="ajax-loader.gif"></img></div>

</div> 
 
</body> 
<script>


$(function(){
 $('.menu span').bind('mouseenter mouseleave', function() {
		
       $(this).toggleClass('over');
	   $('#submenu_anioprx').css('display','none');
    });
});
$(function(){
 $('#submenu_anioprx span').bind('mouseenter mouseleave', function() {
		
       $(this).toggleClass('over');
    });
});

$(function(){
 $('.anioprx').bind('mouseenter mouseleave', function() {
  
       
	   if (this.className != 'menu'){$('#submenu_anioprx').css('display','inline');}
	   
  });
});

$(function(){
 $('#admin').click( function() {
  
       $('#admin').attr("href","ajax_jquery.php?page=mostrar_plantilla.php");
	   $('#admin').text("Volver al panel de vista");	   
  });
});


$(function(){
$('#submenu_anioprx span').click(function(evento) {
        
		evento.preventDefault();
		$('#submenu_anioprx').css('display','none');
		$("#cargando").css("display", "inline");
		$("#destino2").css("display", "none");
		var eleccion = this.className;
		var mes;
		var fecha=new Date();
		var anio = fecha.getFullYear();
		switch ( eleccion) {    case 'eneroprx over':
								{mes = 13;
								$("#titulo_mes").html("Enero "+ (anio+1));
									break;}
							    case 'febreroprx over':
								{ mes = 14;
								$("#titulo_mes").html("Febrero "+ (anio+1));
									break;}	
								case 'marzoprx over':
								{ mes = 15;
								$("#titulo_mes").html("Marzo "+(anio+1));
									break;}
							
							}
							
		$("#destino2").load("<?php echo $page; ?>?grupo=<?php echo $grupo; ?>&mes=" + mes, function(){
			$("#cargando").css("display", "none");
			$("#destino2").css("display", "inline");
		});
		return false;
	});
 });

</script>
</html>
