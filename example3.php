<?php
require('config.php');
//

$mysqli = new mysqli(_DB_SERVER_,_DB_USER_,_DB_PASSWD_,_DB_NAME_);

/* Check database connection */
if (mysqli_connect_errno())
    die("Error: " . mysqli_connect_error());

 
$query = "SELECT * FROM payments"; // We create our query

if ($result = $mysqli->query($query)) {

    while ($row = $result->fetch_object()) {
		echo $row->employee_id;
		echo " - ";
		echo $row->name;
		echo " - ";
		echo $row->salary;
		echo " - ";
		echo $row->payday;
		echo "\n<BR>";	
    }

    $result->close();
}

$mysqli->close();

?>