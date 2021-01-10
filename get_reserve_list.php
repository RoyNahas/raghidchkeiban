<?php
	header("Content-Type: application/json");
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, PATCH, DELETE');
	header('Access-Control-Allow-Headers: X-Requested-With, content-type, Authorization');

class datas {
    public $msg;
    public $user;
}	

class user {}

	//$conn = oci_pconnect(ORA_CON_UN, ORA_CON_PW, ORA_CON_DB, 'AL32UTF8');
	$mysqli = new mysqli("sql304.epizy.com","epiz_27628386","OIfpa0JwPuwgQ65","epiz_27628386_raghidchkeiban");
	// Check connection
	if ($mysqli -> connect_errno) {
		echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	exit();
  }
	// Start
    $data = Array();
    $data = new datas();
    $data->msg = "Test";
    $data_result = Array();
    
	
	$sql = "SELECT * FROM reservation";
	$result -> $mysqli -> query($sql);
	
  
    array_push($data, $result);
    
//	$data->user = $data_result ;

// --- END STEPS --- \\

	print(json_encode($data));

?>