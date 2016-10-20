<?php
$db_hostname = 'localhost';         // Database hostname
$db_username = 'root';				// Database username
$db_password = 'root';					// Database password
$db_name = 'database_ian';					// Database name

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

if(!$conn) 
{
	echo "Unable to connect database. ".mysqli_error($conn);die;
}
else
{
	echo "Database connected successfully. ";
}
?>