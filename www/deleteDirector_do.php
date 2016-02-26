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
	
	$director_name = $_POST['director_name'];
	
	$sql = "delete from director where director_name = '$director_name';";
	  if(mysql_query($sql))
        {
				header('refresh: 2;url=director_admin.php');
				print '刪除成功，畫面將於兩秒後跳回管理頁面';
        }
        else
        {
				header('refresh: 3;url=director_admin.php');
				print '刪除失敗，此導演可能不存在於資料庫，畫面將於三秒後跳回管理頁面';
        }
	
	
	
	
	?>