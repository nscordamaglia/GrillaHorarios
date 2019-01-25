<?php  session_start();

/*if(isset($_SESSION["Legajo"])){
			
			if ($_SESSION["admin"] == "Si"){
                                
				header("Location:ajax_jquery.php?legajo=".$_SESSION["Legajo"]."&page=cargar_plantilla.php");
		   }else{
                                
				header("Location:ajax_jquery.php?page=mostrar_plantilla.php");
				}
}*/

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login CCGC</title>
<link href="style.css" type="text/css" rel="stylesheet">
<link rel="stylesheet" href="/jquery/global.css" type="text/css" media="all" />
<script src="/jquery/jquery-1.4.2.js" type="text/javascript"></script>
<script type="text/javascript" src="/jquery/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="/jquery/sexyalertbox.v1.2.jquery.js"></script>
<link rel="stylesheet" type="text/css" media="all" href="/jquery/sexyalertbox.css"/>
<script type="text/javascript">
$(document).ready(function() {
	var grupo;
	$("#login").submit(function()
		{
			
			$.get("login.php",{ user:$('#user').val(),pass:$('#password').val()} ,function(data)
			{
				
				if(data == 'ok')
				{
				//$('.msg').show(1000);
				document.location="ajax_jquery.php?page=mostrar_plantilla.php&grupo=";
				}
				else if(data == 'error')
				{
				$('.msg_info').html('<p>Usuario y contraseña no valida</p>').css('display','inline');
				
				}
				else if(data == 'cambio')
				{
				$('.msg_info').html("<p><a href='#' onclick='test();return false;'>Cambiar clave</a></p>").css('display','inline');
				
				}
				/*else 	{
							//$('.msg').show(1000);
							document.location= "ajax_jquery.php?grupo="+data+"&page=cargar_plantilla.php";
							}*/
							
							
				
			});
			return false;
		});
});

function test() {
  Sexy.prompt('<h1>Cambio de clave</h1>Ingresa una nueva clave para poder identificarte en el sistema.','clave' ,{ onComplete: 
    function(clave) {
      if(clave != '123456' && clave != '')
      {
        Sexy.confirm('<h1>Gracias,</h1><p>¿Desea concretar el cambio?</p><p>Pulsa "Ok" para continuar, o pulsa "Cancelar" para salir.</p>', {onComplete: 
          function(returnvalue) { 
            if(returnvalue)
            {
              Sexy.info('<h1>Bienvenido</h1><em>versión 2.01</em><br/><p>&copy;2010-2011 Todos los derechos reservados.</p>', {onComplete:
              function(returnvalue){
				  $(function(){
					$.get("cambio_pass.php",{ user:$('#user').val(),pass:clave} ,function(data){
					
							if(data == 'no')
							{
							//$('.msg').show(1000);
							document.location= "ajax_jquery.php?page=mostrar_plantilla.php";
							}
							else if(data == 'si')
							{
									//$('.msg').show(1000);
									if ($('#user').val() == 'u090777' || $('#user').val() == 'u090623' || $('#user').val() == 'u185367' || $('#user').val() == 'u185043'){
					grupo = 'Front';
					}else if ($('#user').val() == 'u184345'){
					grupo = 'Vip';
					}else if ($('#user').val() == 'u191613'){
					grupo = 'Prestacion';
					}
				document.location= "ajax_jquery.php?grupo="+grupo+"&page=cargar_plantilla.php";
							}
							
						
					});
				  });
				}
              });
             
            }
            else
            {
            Sexy.alert('<h1>Error</h1><em>versión 1.0</em><br/><p>Debe ingresar una nueva clave para poder ingresar al sistema</p>');
            }
          }
        });
      }
      else
      {
        Sexy.error('<h1>Error al intentar cambiar la password </h1><p>Para continuar, debes ingresar una clave distinta en la casilla en blanco.</p><p>Inténtalo de nuevo.</p>');
      }
    }
  });
}	
</script>
</head>
	<body>
			<div id="box">
			<div>V2.01</div>
                <form id="login" action="" method="get">
                <fieldset>
                <legend>Login</legend>
                <label for="login">Legajo</label>
                <input type="text" name="user" id="user">
                <div class="clear"></div>
                <label for="password">Password</label>
                <input type="password" name="pass" id="password">
                <div class="clear"></div>
                <br>
                <input type="submit"  value="Log in" name="commit" class="button" style="margin: -20px 0pt 0pt 287px;">
                <div class='msg_info' style='display:none; '></div>
                
                </fieldset>
                </form>
            </div>	
<!--<div class='msg' style='display:none; '><img src="loading.gif"></img></div>-->

</body>

</html>
