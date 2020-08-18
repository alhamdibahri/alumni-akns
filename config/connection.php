<?php
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass	= "";
	$dbname = "alumni";
	$connect = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$connect){
		echo 'Tidak dapat terhubung ke database';
	}
?>