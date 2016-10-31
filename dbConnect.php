<?php
	$db_not_connect_error= 'Sorry we could not connect. Please try again.';
	//connecting to database
	if(!@mysql_connect($host, $user, $password) || !@mysql_select_db($dbName))
	{
		die($db_not_connect_error);
	} 
	
?>
