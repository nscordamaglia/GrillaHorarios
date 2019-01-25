<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2012 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2012 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.7, 2012-05-19
 */

/** Error reporting */
error_reporting(E_ALL);

date_default_timezone_set('Europe/London');

/** Include PHPExcel */
require_once '/hermes/bosoraweb048/b2172/myd.nico110/public_html/Classes/PHPExcel.php';


// Create new PHPExcel object
$objPHPExcel = new PHPExcel();
include("dbconnect.php");

$sql_emp = "SELECT * FROM  `empleados` ORDER BY Grupo ASC LIMIT 0 , 300";
$resultado_emp = mysql_query($sql_emp,$db); 
$sql_statement = "SELECT * FROM  `82012`  LIMIT 0 , 300";
$resultado = mysql_query($sql_statement,$db); 

$cant_fil = mysql_num_rows($resultado);
$cant_col = mysql_num_fields($resultado);
// Set document properties
$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
							 ->setLastModifiedBy("Maarten Balliauw")
							 ->setTitle("Office 2007 XLSX Test Document")
							 ->setSubject("Office 2007 XLSX Test Document")
							 ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("Test result file");


// Add some data
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
	$sql_statement = "SELECT * FROM  `82012` WHERE `Nombre` = '$fila_emp[0]' ORDER BY 'Grupo' ASC LIMIT 0 , 300";
	$busqueda = mysql_query($sql_statement,$db); 
	$fila = mysql_fetch_array($busqueda);
	for ($c = 0; $c < $cant_col+1; $c++) {
		$objPHPExcel->getActiveSheet()
			        ->setCellValueByColumnAndRow($c, $f+4, $fila[$c]); 
	
	   }
$f++;	
	}
// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Simple');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
//header('Content-Disposition: attachment;filename="01simple.xls"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('reporte.xls');
exit;