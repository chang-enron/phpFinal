<?php
	header('Content-Type: text/html; charset=utf8');
	$hostname_sql_conn = 'localhost';
	$username_sql_conn = 'root';
	//$password_sql_conn = 'dblab605';
	$password_sql_conn = 'qqqq';
	$sql_conn = mysql_connect($hostname_sql_conn,$username_sql_conn,$password_sql_conn)or trigger_error(mysql_error(),E_USER_ERROR); 
	//$sql_conn = mysql_connect('140.121.196.81', 'root', 'dblab605')or trigger_error(mysql_error(),E_USER_ERROR); 

	if(!$sql_conn)
		echo "can't connect!!!";

	mysql_query("SET NAMES 'utf-8'");
	mysql_select_db("a12",$sql_conn);
	
	
	$command_code = $_POST['command_code'];
	
	$sql = "delete from command where command_code = '$command_code' ;";
	mysql_query($sql)
				

?>

<head>
<meta charset = "utf-8">
	<title>搭肩哥影評網</title>
	<style type = "text/css">
			p  {font-family : arial,sans-serif;}
			a  {text-decoration:none;}
			.right {text-align:right;}
		</style>
</head>
<body>
	<div style="position : absolute; left : 25%; top: 40% ; background-color:#FFFF99;">
		<form name = "apply" method="post" action="updateCommand_do.php">
			<p style="text-align : center;">修改評論</p>
			<p>請輸入評論內容：<input type = "text" name = "command" required="required"/></p>
			<p>請輸入評分：<input type = "text" name = "level" required="required"/></p>
	
			<p class = "right"><input type = "submit" value = "送出" /></p>
		</form>
	</div>
</body>
