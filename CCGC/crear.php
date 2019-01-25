<?php 
//include the information needed for the connection to MySQL data base server. 
// we store here username, database and password 
//include("dbconfig.php");
 
// to the url parameter are added 4 parameters as described in colModel
// we should get these parameters to construct the needed query
// Since we specify in the options of the grid that we will use a GET method 
// we should use the appropriate command to obtain the parameters. 
// In our case this is $_GET. If we specify that we want to use post 
// we should use $_POST. Maybe the better way is to use $_REQUEST, which
// contain both the GET and POST variables. For more information refer to php documentation.
// Get the requested page. By default grid sets this to 1. 
$page = $_GET['page']; 
 
// get how many rows we want to have into the grid - rowNum parameter in the grid 
$limit = $_GET['rows']; 

 
// get index row - i.e. user click to sort. At first time sortname parameter -
// after that the index from colModel 
$sidx = $_GET['sidx']; 
 
// sorting order - at first time sortorder 
$sord = $_GET['sord']; 
 
// if we not pass at first time index use the first column for the index or what you want
if(!$sidx) $sidx =1; 
 
include("dbconnect.php"); 

$valor = 0;
$mes = DATE("t");
echo $mes;
switch ($mes) {
				case 28: {
				$result = mysql_query("
			CREATE TABLE 42010 (                                                     
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			                                    
			  Nombre char(100) DEFAULT NULL                                 
			   
			); ");
				
				}
				case 29: {
				$result = mysql_query("
			CREATE TABLE 42010 (                                                     
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			                                         
			  Nombre char(100) DEFAULT NULL                                 
			   
			); ");
				
				}
				case 30: {
				$result = mysql_query("
			CREATE TABLE `host_7235397_horarios`.`42010` ( 
			  `Nombre` char(20)  NULL,                                                  
			  `1` char(2)  NULL,
			  `2` char(2)  NULL ,
			  `3` char(2)  NULL ,
			  `4` char(2)  NULL ,
			  `5` char(2)  NULL ,
			  `6` char(2)  NULL ,
			  `7` char(2)  NULL ,
			  `8` char(2)  NULL ,
			  `9` char(2)  NULL ,
			  `10` char(2)  NULL ,
			  `11` char(2)  NULL ,
			  `12` char(2)  NULL ,
			  `13` char(2)  NULL ,
			  `14` char(2)  NULL ,
			  `15` char(2)  NULL ,
			  `16` char(2)  NULL ,
			  `17` char(2)  NULL ,
			  `18` char(2)  NULL ,
			  `19` char(2)  NULL ,
			  `20` char(2)  NULL ,
			  `21` char(2)  NULL ,
			  `22` char(2)  NULL ,
			  `23` char(2)  NULL ,
			  `24` char(2)  NULL ,
			  `25` char(2)  NULL ,
			  `26` char(2)  NULL ,
			  `27` char(2)  NULL ,
			  `28` char(2)  NULL ,
			  `29` char(2)  NULL ,
			  `30` char(2)  NULL                                        
			  			                                  
			   
			); ");
				
				}
				case 31: {
				$result = mysql_query("
			CREATE TABLE 42010 (                                                     
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,
			  1 char(20) DEFAULT NULL ,   
			  1 char(20) DEFAULT NULL ,                                      
			  Nombre char(100) DEFAULT NULL                                 
			   
			); ");
	
	}
}

		$sql = mysql_query("SELECT * FROM `empleados` LIMIT 0, 300 "); 
		$cant_emp = mysql_num_rows($sql); 
		echo $cant_emp;
		for ($filas = 0; $filas < $cant_emp ; $filas++){
				$row = mysql_fetch_array($sql);
				$empleado = $row[0];
					$result = mysql_query("
					INSERT INTO  `host_7235397_horarios`.`42010` (
					`Nombre`,
					`1` ,
					`2` ,
					`3` ,
					`4` ,
					`5` ,
					`6` ,
					`7` ,
					`8` ,
					`9` ,
					`10` ,
					`11` ,
					`12` ,
					`13` ,
					`14` ,
					`15` ,
					`16` ,
					`17` ,
					`18` ,
					`19` ,
					`20` ,
					`21` ,
					`22` ,
					`23` ,
					`24` ,
					`25` ,
					`26` ,
					`27` ,
					`28` ,
					`29` ,
					`30` 
					
					)
					VALUES (
					'$empleado', '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0',  '0'  
					);
					
					");
		}
/*
// calculate the number of rows for the query. We need this for paging the result 
$result = mysql_query("SELECT COUNT(*) AS count FROM 42010"); 
$row = mysql_fetch_array($result,MYSQL_ASSOC); 
$count = $row['count']; 
 
// calculate the total pages for the query 
if( $count > 0 && $limit > 0) { 
              $total_pages = ceil($count/$limit); 
} else { 
              $total_pages = 0; 
} 
 
// if for some reasons the requested page is greater than the total 
// set the requested page to total page 
if ($page > $total_pages) $page=$total_pages;
 
// calculate the starting position of the rows 
$start = $limit*$page - $limit;
 
// if for some reasons start position is negative set it to 0 
// typical case is that the user type 0 for the requested page 
if($start <0) $start = 0; 
 
// the actual query for the grid data 
$SQL = "SELECT d1,d2,d3,d4,d5,d6,d7,d8,d9,d10,d11,d12,d13,d14,d15,d16,d17,d18,d19,d20,d21,d22,d23,d24,d25,d26,d27,d28,d29,d30, Nombre FROM 42010";// ORDER BY $sidx $sord LIMIT $start , $limit"; 
$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error()); 
 
// we should set the appropriate header information. Do not forget this.
header("Content-type: text/xml;charset=utf-8");
 
$s = "<?xml version='1.0' encoding='utf-8'?>";
$s .=  "<rows>";
$s .= "<page>".$page."</page>";
$s .= "<total>".$total_pages."</total>";
$s .= "<records>".$count."</records>";
 
// be sure to put text data in CDATA
while($row = mysql_fetch_array($result,MYSQL_ASSOC)) {
    $s .= "<row id='". $row[d1]."'>";        
    $s .= "<cell>". $row[d2]."</cell>";
    $s .= "<cell>". $row[d3]."</cell>";
    $s .= "<cell>". $row[d4]."</cell>";
    $s .= "<cell>". $row[d5]."</cell>";
    $s .= "<cell>". $row[d6]."</cell>";
    $s .= "<cell>". $row[d7]."</cell>";
    $s .= "<cell>". $row[d8]."</cell>";
    $s .= "<cell>". $row[d9]."</cell>";
    $s .= "<cell>". $row[d10]."</cell>";
    $s .= "<cell>". $row[d11]."</cell>";
    $s .= "<cell>". $row[d12]."</cell>";
    $s .= "<cell>". $row[d13]."</cell>";
    $s .= "<cell>". $row[d14]."</cell>";
    $s .= "<cell>". $row[d15]."</cell>";
    $s .= "<cell>". $row[d16]."</cell>";
    $s .= "<cell>". $row[d17]."</cell>";
    $s .= "<cell>". $row[d18]."</cell>";
    $s .= "<cell>". $row[d19]."</cell>";
    $s .= "<cell>". $row[d20]."</cell>";
    $s .= "<cell>". $row[d21]."</cell>";
    $s .= "<cell>". $row[d22]."</cell>";
    $s .= "<cell>". $row[d23]."</cell>";
    $s .= "<cell>". $row[d24]."</cell>";
    $s .= "<cell>". $row[d25]."</cell>";
    $s .= "<cell>". $row[d26]."</cell>";
    $s .= "<cell>". $row[d27]."</cell>";
    $s .= "<cell>". $row[d28]."</cell>";
    $s .= "<cell>". $row[d29]."</cell>";
    $s .= "<cell>". $row[d30]."</cell>";
    $s .= "<cell><![CDATA[". $row[Nombre]."]]></cell>";
    $s .= "</row>";
}
$s .= "</rows>"; 
 
echo $s;*/
?>
