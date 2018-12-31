<?php 
$host="localhost";
$user="root";
$pw="12345678";
$db="proyecto";
$con=@mysql_connect($host, $user, $pw) or die ("problemas al conectar");
mysql_select_db($db, $con) or die ("problemas al conectar con la base de datos");
mysql_set_charset('utf8');
date_default_timezone_set('America/New_York');
 ?>