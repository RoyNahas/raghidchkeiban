<?php
	header("Content-Type: application/json");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With, content-type, Authorization');

	$mysqli = new mysqli("sql304.epizy.com","epiz_27628386","OIfpa0JwPuwgQ65","epiz_27628386_raghidchkeiban");
	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
	
	// Perform queries and print out affected rows
	$mysqli -> query("SELECT * FROM reservation");
	echo "Affected rows: " . $mysqli -> affected_rows;
	
	$mysqli -> query("DELETE FROM Persons WHERE Age>32");
	echo "Affected rows: " . $mysqli -> affected_rows;
	
	$mysqli -> close();
?>