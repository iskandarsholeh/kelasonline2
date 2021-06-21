<?php 
session_start();
session_regenerate_id(true);
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "coding";

	$koneksi = mysqli_connect($host, $user, $pass, $db);

	if(!$koneksi) {
		die("Koneksi gagal : ".mysql_connect_error());
	}
?>