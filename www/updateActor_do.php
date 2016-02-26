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
	$old_actor_name = $_POST['old_actor_name'];
	$pic = $_POST['pic'];
	
	if($old_actor_name)
	{
		$sql = "update actor set 	actor_name = '$actor_name', 
									actor_intro = '$actor_intro' ,
									pic = '$pic'
							where actor_name = '$old_actor_name';";
		if(mysql_query($sql))
		{
			header('refresh: 2; url = actor_admin.php');
			print '修改成功，頁面將於二秒後跳回管理頁面';
		}
		else
		{
			header('refresh: 3; url = actor_admin.php');
			print '修改失敗，此導演可能不在此資料庫中，頁面將於三秒後跳回管理頁面';
		}
	}	

	else{
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
				<div style="position : absolute; left : 25%;background-color:#FFFF99;">
					<form  method="post" action="updateActor_do.php">
						<p style="text-align : center;">修改',$actor_name,'演員資料</p>
						<p>請輸入演員名稱：<input type = "text" name = "actor_name" value = "',$actor_name,'" required="required"/></p>
						<p>請輸入演員介紹：<input type = "text" name = "actor_intro" value = "',$actor_intro,'" required="required"/></p>
						<p>請輸入演員圖片：<input type = "text" name = "pic" value = "',$pic,'" required="required"/></p>
						<input type = "hidden" name = "old_actor_name" value = "',$actor_name,'">
						<p class = "right"><input type = "submit" value = "送出" /></p>
					</form>
				</div>
			</body>';
		}
?>