<?php
//----------------------------------------------------
// DB connection function
// Can be modified to use CONSTANTS defined in config.inc
//----------------------------------------------------
include_once './Model/config.php';

function ConnectDB()
{
    $mysqli = new mysqli(host, user, pass, BD, port);

	if ($mysqli->connect_errno) {
		new Mensaje("Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, './index.php');
		return false;
	}
	else{
		return $mysqli;
	}
}

?>
