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
	
	$actor_name = $_POST['actor_name'];
	$actor_intro = $_POST['actor_intro'];
	$pic = $_POST['pic'];
	
	
	
	$sql = "select actor_name from actor where actor_name = '$actor_name';";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	if(!$a)
	{
			$sql = "insert into actor values('$actor_name', '$actor_intro','$pic');";
			mysql_query($sql);
		
		header('Refresh:2 ; URL=actor_admin.php');
		print'新增成功，畫面將於兩秒後回到管理頁面';
	}
	else 
	{	
		header('Refresh:3 ; URL=actor_admin.php');
		print'此演員已存在資料庫，畫面將於三秒後回到管理頁面';
	}
	
	
	
	?>