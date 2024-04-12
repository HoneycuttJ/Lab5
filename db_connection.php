<?php 
	$conn = new mysqli("localhost", "root", "", "ems_db", 3307);
	
	
	if ($conn->connect_errno)
	{
		die("Could not connect:".$conn->connect_errno);
	}
	?>
	
