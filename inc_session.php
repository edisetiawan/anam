<?php 

	session_start();
	if(empty($_SESSION['idnya'])){
		header("location:login.php?sapi=hack");
	}
	
?>