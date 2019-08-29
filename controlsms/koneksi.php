<?php
	$host 		= 'localhost';
	$user 		= 'root';
	$password 		= '';
	$Database 		= 'db_konter';

	$koneksi = mysqli_connect($host, $user, $password);
	mysqli_select_db($koneksi, $Database);
?>