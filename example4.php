<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Example 4</title>
</head>
<body>
<?php
require('config.php');
//
$mysqli = new mysqli(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);

/* Check database connection  */
if (mysqli_connect_errno())
    die("Error: " . mysqli_connect_error());

$query = "SELECT * FROM payments"; // We create our query

?>
<table align="center" cellspacing=4 cellpadding=10 border=1>
  <tr>
    <th>Employee Id</th>
    <th>Name</th>
    <th>Salary</th>
    <th>Pay Date</th>
  </tr>
<?php
if ($result = $mysqli->query($query)) {
    while ($row = $result->fetch_object()) {
		$payday = new DateTime($row->payday);  //  We use DateTime class
											// to format date					  
		// We'll use number_format function to format numeric values
?>
  <tr>
    <td><?=$row->employee_id?></td>
    <td><?=$row->name?></td>
    <td align="center"><?=number_format($row->salary,2)?></td>
    <td><?=$payday->format('d/m/Y')?></td>
  </tr>
<?php	
    }
    $result->close();
}
$mysqli->close(); 
?>  
</table>
</body>
</html>