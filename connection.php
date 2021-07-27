<?php
	require('validation.php');
	//1st way
	$con=mysqli_connect("localhost","root","","studentl");

	//2nd way
	//MySQL connect information
/*	
	$servername ="localhost";
	$db_user    ="root";
	$password   ="";
	$c_database ="studentl";
	
	//Create connection
	$studentconnection=mysqli_connect($servername,$db_user,$password,$c_database);
	
	//Check connection
	if(!$studentconnection)
	{
		die("Connection failed:".mysqli_connect_error());
	}
*/
?>