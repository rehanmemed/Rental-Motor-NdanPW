<?php 

	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname   = 'ndanpwmotor';

	$conn = mysqli_connect($hostname, $username, $password, $dbname) or die ('Gagal terkoneksi ke database');
?>