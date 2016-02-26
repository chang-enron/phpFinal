<?PHP 
	$type = "Animated";//資料庫中的類型是愛情, 如果這個也可以動態拿到, 每個type的頁面就不用寫新的了 , 可是我不知道怎麼拿QQ
	//header('Content-Type: text/html; charset=utf-8');
	$hostname_sql_conn = 'localhost';
	$username_sql_conn = 'root';
	$password_sql_conn = 'qqqq';//資料庫密碼
	$sql_conn = mysql_pconnect($hostname_sql_conn,$username_sql_conn,$password_sql_conn)or trigger_error(mysql_error(),E_USER_ERROR); 
	$i = 0;
	if(!$sql_conn)
		echo "can't connect!!!";
		
	mysql_query("SET NAMES 'utf-8'");
	mysql_select_db("a12",$sql_conn);//連資料庫
	
	$sql = "select * from movie where type='$type'";
	$data = mysql_query($sql);
	
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
	<img src='animation.jpg'  width='100%' height='20%'>
		<table border='1px'>
			<?PHP
				while(true)
				{
					$a = mysql_fetch_row($data);
					if($a)
					{
						$movie_name = $a[0];
						$year = $a[1];
						$month = $a[2];
						$date = $a[3];
						$director_name = $a[4];
						$actor_name = $a[5];
						$level = $a[7];
						$pic=$a[10];
						echo "<tr>
								<td width='10%'><img src='$pic' width='100%' height='20%'></td>
							<td>  ",$movie_name," </td>
							<td> 導演: ",$director_name," </td>
							<td>演員:",$actor_name,"</td>
							<td><form method = 'post' action = 'detail.php'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type = 'submit' value='看更多!!' >
								</form></td>
						</tr>";
					}
					else break;
				}
			?>
			
		</table>
	</body>
</html>