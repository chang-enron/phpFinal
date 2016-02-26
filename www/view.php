<?php
	//header('Content-Type: text/html; charset=utf8');
	session_start();
	$user_id = $_SESSION['user_id'];
?>

<head>
<meta charset = "utf-8">
	<title>搭肩哥影評網</title>
	<style type = "text/css">
		p  {font-family : arial,sans-serif;}
		a  {text-decoration:none;}
	</style>
	<meta http-equiv="refresh" content="5;url=home.php">
</head>
<body>
	<div style="background-color:#FFFF99;">
		<p> <?PHP echo $user_id ?> 你好! </p>
		<p>五秒後會自動跳回首頁</p>		
		<p ><a href="home.php"> 手動回到首頁</a></p>
		
		<p onload=goback()></p>
	</div>
</body>