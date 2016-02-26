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
	
	//echo $movie_name;

	
	
	$sql = "select * from movie where movie_name like '%$movie_name%';";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	?>
	<html>
	<head>
		<meta charset = "utf-8">
		<title>搭肩哥影評網</title>
		<style type = "text/css">

		body            {
							font-family:微軟正黑體,標楷體;
							background-color:#CCDDFF;
							padding:0;
							margin:0;
						}						
	td             {
						font-family:微軟正黑體,標楷體;
						font-weight:bolder;
						vertical-align:middle;
						font-size:20px;
						
						}		
		</style>
	</head>
	<body>
		<table border='1px'>
	<?PHP
	while($a)
	{
			$movie_name = $a[0];
			$year = $a[1];
			$month = $a[2];
			$date = $a[3];
			$director_name = $a[4];
			$actor_name = $a[5];
			$level = $a[7];
			$type = $a[8];
			$num_command = $a[9];
			$pic=$a[10];
			echo"<tr>
					   <td width='10%' height='30%'><img src='$pic' width='100%' ></td>
						<td>$a[0] </td>
						<td>$a[1] 
							$a[2] 
						$a[3] </td>
						<td>$a[4] </td>
						<td>$a[5]</td>
						<td>$a[7] </td>
						<td>$a[8] </td>
						<td>$a[9]</td>
				<td><form method='post' action = 'detail.php'>
					<input type='submit' value='詳細資料'/>
					<input type='hidden' name = 'director_name' value='",$director_name,"'/>
					<input type='hidden' name = 'movie_name' value='",$movie_name,"'/>
				</form></td></tr>	";
			$a = mysql_fetch_row($data);
	}
	
	
	
	
	?>