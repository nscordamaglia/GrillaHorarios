<?php session_start();

if(isset($_SESSION["Legajo"])){
			
			if ($_SESSION["admin"] == "No"){
				header("Location:ajax_jquery.php?page=mostrar_plantilla.php");
			}
}else {header("Location:index.php");}

/*error_reporting(E_ALL);
ini_set('display_errors', '1');*/


date_default_timezone_set('America/Argentina/Buenos_Aires');

// require the PHPExcel file
require_once('/home/users/web/b2172/myd.nico110/public_html/Classes/PHPExcel.php');


$legajo = $_SESSION["Legajo"];
$tabla_mes = $_GET['tabla_mes'];
$mes = $_GET['mes'];

// Create new PHPExcel object

$objPHPExcel = new PHPExcel();

include("dbconnect.php");

$sql_emp = "SELECT * FROM  `empleados` ORDER BY Grupo ASC LIMIT 0 , 300";
$resultado_emp = mysql_query($sql_emp,$db); 

$sql_statement = "SELECT * FROM  `$tabla_mes`  LIMIT 0 , 300";
$resultado = mysql_query($sql_statement,$db); 

$cant_fil = mysql_num_rows($resultado);
$cant_col = mysql_num_fields($resultado);

//Mostramos los nombres de las tablas

mysql_field_seek($resultado,0);
$col = 0;
$fil = 'a';
while ($field = mysql_fetch_field($resultado)){
	
		$objPHPExcel->getActiveSheet()
			        ->setCellValueByColumnAndRow($col, 4,  $field->name)
					->getColumnDimension($fil)->setAutoSize(true);
	$col++; ++$fil;	

}
mysql_field_seek($resultado_emp,0);

$f=1;
while ($fila_emp = mysql_fetch_array($resultado_emp)){
	$sql_statement = "SELECT * FROM  `$tabla_mes` WHERE `Nombre` = '$fila_emp[0]' ORDER BY 'Grupo' ASC LIMIT 0 , 300";
	$resultado = mysql_query($sql_statement,$db); 
	$fila = mysql_fetch_array($resultado);
	for ($c = 0; $c < $cant_col+1; $c++) {
		$objPHPExcel->getActiveSheet()
			        ->setCellValueByColumnAndRow($c, $f+4, $fila[$c] ); 
	
	   }
$f++;	
	}






// Rename sheet

$objPHPExcel->getActiveSheet()->setTitle($mes);


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);




// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="Horarios_'.date('dMy').'.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>