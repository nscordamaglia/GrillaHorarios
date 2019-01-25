<?php



// connect to the MySQL backup server TECO

/*$db = mysql_connect('localhost', 'root', 'nico110') or die("Connection Error: " . 

mysql_error());*/ 

 

//select the database 

/*mysql_select_db('horarios') or die("Error connecting to db.");*/


// connect to the MySQL backup server MyDomain

$db = mysql_connect('nico110.mydomaincommysql.com', 'rustycius', 'nico110') or die("Connection Error: " . 

mysql_error()); 

 

//select the database 

mysql_select_db('ccgc_horarios') or die("Error connecting to db.");

?>
