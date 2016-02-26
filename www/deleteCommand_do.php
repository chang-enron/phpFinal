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
	
	
	$sql = "delete from command where command_code = '$command_code';";
	  if(mysql_query($sql))
        {
			$sql3 = "update command set command_code = command_code - '1' where command_code > '$command_code';";
			mysql_query($sql3);
			$sql2 = "update movie set level = 
									(select avg(level) from command where movie_name = '$movie_name' and director_name = '$director_name'),
									num_command = (select count(command_code) from command where movie_name = '$movie_name' and director_name = '$director_name')
					where movie_name = '$movie_name' and director_name = '$director_name';";
			if(mysql_query($sql2))
				{
					session_start();
					$_SESSION['movie_name'] = $movie_name;
					$_SESSION['director_name'] = $director_name;
					if(!$_POST['admin'])
					{
						header('refresh: 2; url = detail.php');	
					}
					else 
					{
						header('refresh: 2; url = command_admin.php');
					}
					print '刪除成功，頁面將於二秒後跳回管理頁面';
				}
			else
			{
				header('refresh: 3; url = updateCommand_do.php');
				print '修改評等失敗，此評論可能不在此資料庫中，頁面將於三秒後跳回管理頁面';
			}
        }
        else
        {
				header('refresh: 3;url=director_admin.php');
				print '刪除失敗，此評論可能不存在於資料庫，畫面將於三秒後跳回管理頁面';
        }
	
	
	
	
	?>