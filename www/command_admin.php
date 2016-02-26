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

	if($_POST['type'])
		$type = $_POST['type'];
	else $type="null";
	
	if($type=="null")
		$sql = "select command.id, movie.type,command.movie_name, command.director_name, command.level, command.command, command.command_code
		from movie, command 
		where command.movie_name = movie.movie_name and command.director_name = movie.director_name";
	else $sql = "select command.id, movie.type,command.movie_name, command.director_name, command.level, command.command
		from movie, command
		where type='$type' and  command.movie_name = movie.movie_name and command.director_name = movie.director_name; ";
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
			
			<div>
			<form method = 'post' action = 'command_admin.php'>
				<select name="type">
					<option value="null">全部</option>
					<option value="love">愛情</option>
					<option value="action">動作</option>
					<option value="comedy">喜劇</option>
					<option value="mystery">懸疑</option>
					<option value="thriller">驚悚</option>
					<option value="drama">劇情</option>
					<option value="animated">動畫</option>
				</select>
				<input type='submit' value='送出'></input>
			</form>
			</div>
		
			<?PHP
			echo	"<tr>
					<td> 使用者帳號</td>
					<td> 電影類型</td>
					<td> 電影名稱</td>
					<td> 導演名稱</td>
					<td> 評等</td>
					<td> 評論內容</td>
					<td> 編輯</td>
					</tr>";

				while(true)
				{
				
					$a = mysql_fetch_row($data);
					if($a)
					{
						$user_id = $a[0];
						$type = $a[1];
						$movie_name = $a[2];
						$director_name = $a[3];
						$command = $a[5];
						$level = $a[4];
						$command_code=$a[6];
						
					
						echo "<tr>
							<td> ",$a[0]," </td>
							<td> ",$a[1]," </td>
							<td> ",$a[2]," </td>
							<td> ",$a[3]," </td>
							<td> ",$a[4]," </td>
							<td> ",$a[5]," </td>
					
							<td><form method = 'post' action = 'deleteCommand_do.php'>
									<input type= 'hidden' name='command_code' value='",$command_code,"'/>
									<input type= 'hidden' name='admin' value='admin'/>
									<input type = 'submit' value='刪除' >
								</form></td>
						</tr>";
					}
					else break;
				}
			?>
			
		</table>
	</body>
</html>