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
	
	
	$sql = "select * from director where director_name like'%$director_name%';";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	if(!$a)
		echo "no data";
	while($a)
	{
			echo"<p>$a[0]  </p>
				<form method='post' action = 'director_detail.php'>
					<input type='submit' value='詳細資料'/>
					<input type='hidden' name = 'director_name' value='",$director_name,"'>
				</form></p>	";
			$a = mysql_fetch_row($data);
	}
	

	
	
	?>