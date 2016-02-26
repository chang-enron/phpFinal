<?PHP 
	header('Content-Type: text/html; charset=utf-8');
	$hostname_sql_conn = 'localhost';
	$username_sql_conn = 'root';
	$password_sql_conn = 'qqqq';//資料庫密碼
	$sql_conn = mysql_pconnect($hostname_sql_conn,$username_sql_conn,$password_sql_conn)or trigger_error(mysql_error(),E_USER_ERROR); 
	$i = 0;
	if(!$sql_conn)
		echo "can't connect!!!";
		
	mysql_query("SET NAMES 'utf-8'");
	mysql_select_db("a12",$sql_conn);//連資料庫

	/*$sql = "select director.director_name, director.director_intro, count(movie_name)
				from director,movie 
				where movie.director_name = director.director_name
				group by director_name;";
	*/		
	$sql = "select * from director ;";
	$data = mysql_query($sql);
	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>搭肩哥影評網</title>
		<style type = "text/css">
		</style>
	</head>
	<body>
		<table border="1">

			<?PHP
			echo	"<tr>
					<td> 導演名稱</td>
					<td> 導演簡介</td>
					<td colspan='2'> 編輯</td>
					</tr>";

				while(true)
				{
				
					$a = mysql_fetch_row($data);
					if($a)
					{
						$director_name = $a[0];
						$director_intro = $a[1];
						
						echo "<tr>
							<td> ",$director_name," </td>
							<td> ",$director_intro," </td>
							<td><form method = 'post' action = 'deleteDirector_do.php'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type = 'submit' value='刪除' >
								</form></td>
							<td><form method = 'post' action = 'updateDirector_do.php'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type= 'hidden' name='director_intro' value='",$director_intro,"'>
									<input type = 'submit' value='修改' >
								</form></td>
						</tr>";
					}
					else break;
				}
			?>
			
		</table>
	</body>
</html>