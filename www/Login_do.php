<?php
	header('Content-Type: text/html; charset=utf-8');
	$hostname_sql_conn = 'localhost';
	$username_sql_conn = 'root';
	$password_sql_conn = 'qqqq';
	$sql_conn = mysql_pconnect($hostname_sql_conn,$username_sql_conn,$password_sql_conn)or trigger_error(mysql_error(),E_USER_ERROR); 
	$i = 0;
	if(!$sql_conn)
		echo "can't connect!!!";
		
	mysql_query("SET NAMES 'utf-8'");
	mysql_select_db("a12",$sql_conn);
	
	$user_id = $_POST["user_id"];
	$password = $_POST["password"];
	
	$sql = "select user_id, password, username, level ";
	$sql .="from user ";
	$sql .="where user_id = '$user_id'" ;
	$sql .="and password = '$password'" ;
	$sql .=";";
	
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	
	if(! $a)
	{
		//echo "帳號/密碼錯誤";
		$url = "Location:Login.php";
	}
	else
	{
		$user_id = $a[0];
		$password = $a[1];
		$username = $a[2];
		$level = $a[3];
		session_start();
		/*
		echo "   form  " ,$_POST["user_id"];
		echo "   ID     ", $ID; 
		echo "   user_id ", $user_id;
		echo "origin ",$_SESSION["user_id"];
		if(isset($_SESSION["user_id"]))
		{
			session_destroy();
			echo "  delete \n";
		}
		*/
	//設定session
		$_SESSION["user_id"]  = $user_id;
		$_SESSION["username"] = $username;
		$_SESSION["level"] = $level;
		//echo "     new " ,$_SESSION["user_id"];
		
		$url = "Location:home.php";
	}
	
	header($url);
	
	?>