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
	$command = $_POST['command'];
	$movie_name = $_POST['movie_name'];
	$director_name = $_POST['director_name'];
	$level_c = $_POST['level'];
	$modify = $_POST['modify'];
	
	if($modify=="yes")
	{
		$sql = "update command set command = '$command',
									level = '$level_c' 
								where command_code = '$command_code';";
		if(mysql_query($sql))
		{
			$sql2 = "update movie set level = 
									(select avg(level) from command where movie_name = '$movie_name' and director_name = '$director_name') 
					where movie_name = '$movie_name' and director_name = '$director_name';";
			if(mysql_query($sql2))
				{
					session_start();
					$_SESSION['movie_name'] = $movie_name;
					$_SESSION['director_name'] = $director_name;
					header('refresh: 2; url = detail.php');
					print '修改成功，頁面將於二秒後跳回管理頁面';
				}
			else
			{
				header('refresh: 3; url = updateCommand_do.php');
				print '修改評等失敗，此電影可能不在此資料庫中，頁面將於三秒後跳回管理頁面';
			}
		}
		else 
		{
			header('refresh: 3; url = updateCommand_do.php');
			print '修改失敗，此評論可能不在此資料庫中，頁面將於三秒後跳回管理頁面';
		}
	}
	else
	{
		echo'
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
				<div style="position : absolute; left : 25%; background-color:#FFFF99;">
					<form  method="post" action="updateCommand_do.php">
						<p style="text-align : center;">修改',$movie_name,'評論</p>
						<p>請輸入評等(1~5)：<input type = "text" name = "level" value = "',$level_c,'" required="required"/></p>
						<p>請輸入評論內容：<input type = "text" name = "command" value = "',$command,'"required="required"/></p>
						<input type= "hidden" name="command_code" value="',$command_code,'">
						<input type= "hidden" name="movie_name" value="',$movie_name,'">
						<input type= "hidden" name="director_name" value="',$director_name,'">
						<input type = "hidden" name = "modify" value = "yes">
						<p class = "right"><input type = "submit" value = "送出" /></p>
					</form>
				</div>
			</body>';
	}
?>