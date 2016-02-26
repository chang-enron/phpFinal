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
	$year = $_POST['year'];
	$month = $_POST['month'];
	$date = $_POST['date'];
	$director_name = $_POST['director_name'];
	$actor_name = $_POST['actor_name'];
	$introduction = $_POST['introduction'];
	$type = $_POST['type'];
	$modify = $_POST['modify'];
	$pic = $_POST['pic'];
	$video = $_POST['video'];
	
	$old_movie_name = $_POST['old_movie_name'];
	$old_director_name = $_POST['old_director_name'];

	if($modify=="yes")
	{		
		$sql = "update movie 
				set movie_name = '$movie_name' ,
					director_name = '$director_name',
					year = '$year',
					month = '$month',
					date = '$date',
					actor_name = '$actor_name',
					introduction = '$introduction',
					type = '$type',
					pic = '$pic',
					video = '$video'
				where movie_name = '$old_movie_name' and director_name = '$old_director_name';";
		if(mysql_query($sql))
		{
			header('refresh: 2; url = movie_admin.php');
			print '修改成功，頁面將於二秒後跳回管理頁面';
		}
		else 
		{
			header('refresh: 3; url = movie_admin.php');
			print '修改失敗，此導演可能不在此資料庫中，頁面將於三秒後跳回管理頁面';
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
					<form  method="post" action="updateMovie_do.php">
						<p style="text-align : center;">修改',$movie_name,'電影資料</p>
						<p>請輸入電影名稱：<input type = "text" name = "movie_name" value = "',$movie_name,'"required="required"/></p>
						<p>請輸入上映年：<input type = "text" name = "year" value = "',$year,'"required="required"/></p>
						<p>請輸入上映月：<input type = "text" name = "month" value = "',$month,'"required="required"/></p>
						<p>請輸入上映日：<input type = "text" name = "date" value = "',$date,'"required="required"/></p>
						<p>請輸入導演名稱：<input type = "text" name = "director_name" value = "',$director_name,'"required="required"/></p>
						<p>請輸入演員名稱：<input type = "text" name = "actor_name" value = "',$actor_name,'"required="required"/></p>
						<p>請輸入電影簡介：<input type = "text" name = "introduction" value = "',$introduction,'"required="required"/></p>
						<p>請選擇類型：
								<select name = "type">
									<option value="love">愛情</option>
									<option value="action">動作</option>
									<option value="comedy">喜劇</option>
									<option value="mystery">懸疑</option>
									<option value="thriller">驚悚</option>
									<option value="drama">劇情</option>
									<option value="animated">動畫</option>
								</select></p>
						<p>請輸入圖片連結：<input type = "text" name = "pic" value = "',$pic,'" required = "required"/></p>
						<p>請輸入預告片(youtube)連結：<input type="text" name = "video" value ="',$video,'" required = "required"/></p>
						<input type = "hidden" name = "old_director_name" value = "',$director_name,'">
						<input type = "hidden" name = "old_movie_name" value = "',$movie_name,'">
						<input type = "hidden" name = "modify" value = "yes">
						<p class = "right"><input type = "submit" value = "送出" /></p>
					</form>
				</div>
			</body>';
	}
?>