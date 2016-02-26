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
	
	/*$sql = "select actor.actor_name, actor.actor_intro, count(movie_name)
				from actor,movie 
				where movie.actor_name = actor.actor_name
				group by actor_name;";
	*/		
	
	$sql = "select *from actor;";
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
					<td> 演員名稱</td>
					<td> 演員簡介</td>
					<td colspan='2'> 編輯</td>
					</tr>";

				while(true)
				{
				
					$a = mysql_fetch_row($data);
					if($a)
					{
						$actor_name = $a[0];
						$actor_intro = $a[1];
						$pic = $a[2];
						
						
						echo "<tr>
							<td> ",$actor_name," </td>
							<td> ",$actor_intro," </td>
							
					
							<td><form method = 'post' action = 'deleteActor_do.php'>
									<input type= 'hidden' name='actor_name' value='",$actor_name,"'>
									<input type = 'submit' value='刪除' >
								</form></td>
							<td><form method = 'post' action = 'updateActor_do.php'>
									<input type= 'hidden' name='actor_name' value='",$actor_name,"'>
									<input type= 'hidden' name='actor_intro' value='",$actor_intro,"'>
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