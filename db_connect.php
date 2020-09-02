<?php 
//This connects the database

	// connect to the database
	$conn = mysqli_connect('localhost', 'user', 'rootuser', 'Covid_biz');

	// check connection
	if(!$conn){
		echo 'Connection error: '. mysqli_connect_error();
	}

?>