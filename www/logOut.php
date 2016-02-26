<?php 
	header('Content-Type: text/html; charset=utf-8');
			//設定session
			session_start();
			session_destroy();
			
			header("Location:home.php");
	
	?>