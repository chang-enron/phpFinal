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
	
	$movie_name = $_POST['movie_name'];
	$director_name = $_POST['director_name'];
	$command = $_POST['command'];
	$level_c = $_POST['level'];
	
	//echo $movie_name;
	//echo $password;
	//echo $username;
	
			//設定session
			session_start();
			$user_id = $_SESSION['user_id'];
			//echo $user_id;
			$sql = "select count(command_code) from command;";
			$data = mysql_query($sql);
			if($data)
			{
				$num = mysql_fetch_row($data);
				//echo $num[0] , $user_id , $movie_name ,$director_name ,$command ,$level_c;
				$sql1 = "insert into command values('$num[0]', '$user_id','$movie_name','$director_name','$command','$level_c');";//insert Command
				if(mysql_query($sql1))
				{
					$sql2 = "update movie set num_command = (select count(command_code) from command where movie_name = '$movie_name' and director_name = '$director_name') ,
									level = (select avg(level) from command where movie_name = '$movie_name' and director_name = '$director_name')
											where movie_name='$movie_name' and director_name = '$director_name';";//改 movie 裡Command個數跟level
					if(mysql_query($sql2))
					{

						$_SESSION['movie_name'] = $movie_name;
						$_SESSION['director_name'] = $director_name;
						header('refresh: 2; url = detail.php');
						print '新增成功，頁面將於二秒後跳回詳細資料頁面';
					}
					else
					{
						header('refresh: 2; url = insertCommand.php');
						print '新增失敗了了了，頁面將於二秒後跳回新增頁面';
					}
				}
				else
				{
				header('refresh: 2; url = love.php');
				print '新增失敗，頁面將於二秒後跳回新增頁面';
				}
			}
	
			else 
			{	
				header('refresh: 2; url = insertCommand.php');
				print '新增失敗?，頁面將於二秒後跳回新增頁面';
		
			}
	
	
	?>