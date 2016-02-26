<?php 
	header('Content-Type: text/html; charset=utf-8');
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
	
	$user_id = $_POST['user_id'];
	$password = $_POST['password'];
	$username = $_POST['username'];
	$level = 0;
	
	//echo $user_id;
	//echo $password;
	//echo $username;
	
	$sql = "select user_id from user where user_id = '$user_id';";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	if(!$a)
	{
			$sql = "insert into user values('$user_id', '$password', '$username', '$level');";
			mysql_query($sql);
			
			//設定session
			session_start();
			$_SESSION['user_id']  = $user_id;
			//$_SESSION['password']  = $password;
			$_SESSION['username'] = $username;
			$_SESSION['level'] = $level;
		
			$redirect = "Location:view.php";
			
	}
	else 
	{	
		
		$redirect = "Location:apply.php";
		
	}
	
	header($redirect);
	
	?>