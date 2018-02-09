<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Example 2</title>
</head>
<body>
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

$sql= "SELECT * FROM payments"; // We create our query

$result = mysql_query($sql,$con); 
?>
<table align="center" cellspacing=4 cellpadding=10 border=1>
  <tr>
    <th>Employee Id</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Pay Date</th>
  </tr>
<?php
while($row=mysql_fetch_object($result)){
	
	$payday = new DateTime($row->payday);  // We use DateTime class
									      // to format date
										  
	// We'll use number_format function to format numeric values
	
?>
  <tr>
    <td><?=$row->employee_id?></td>
    <td><?=$row->name?></td>
    <td align="center"><?=number_format($row->salary,2)?></td>
    <td><?=$payday->format('m/d/Y')?></td>
  </tr>
<?php	
}
mysql_free_result($result);
mysql_close($con); 
?>  
</table>
</body>
</html>