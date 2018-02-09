<?php
require('config.php');
//
$con=mysql_connect(_DB_SERVER_,_DB_USER_,_DB_PASSWD_);

if(!$con){
	die('Unable to connect to server'.mysql_error());
}

$dbselect=mysql_select_db(_DB_NAME_,$con);

if(!$dbselect){
	die('Unable to connect to database'.mysql_error());
}

$sql= "SELECT * FROM payments";

$result = mysql_query($sql,$con); 

while($fila=mysql_fetch_object($result)){
	echo $fila->employee_id;
	echo " - ";
	echo $fila->name;
	echo " - ";
	echo $fila->salary;
	echo " - ";
	echo $fila->payday;
	echo "\n<BR>";	
}

mysql_free_result($result);
mysql_close($con); 

?>