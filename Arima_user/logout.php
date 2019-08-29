<?php 
session_start();
if (!isset($_SESSION['arima_user']) && !isset($_SESSION['arima_pass'])) {
	
	header('location:login.php');
}else{
	
	unset($_SESSION['arima_user']);
	unset($_SESSION['arima_pass']);
	unset($_SESSION['arima_status']);
	header('location:login.php');
	
}


 ?>