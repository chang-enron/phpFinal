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
	
	
	/*
	//設定session
			session_start();
			$_SESSION['user_id']  = $user_id;
			$_SESSION['password']  = $password;
			$_SESSION['username'] = $username;
	*/
	if($_POST['type'])
		$type = $_POST['type'];
	else $type="null";
	
	if($type=="null")
		$sql = "select *
				from movie
				order by year desc,month desc,date desc;";
	else $sql = "select *
				from movie
			where type='$type'
			order by year desc,month desc,date desc;";
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
			<form method = 'post' action = 'movie_admin.php'>
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
					<td> 電影名稱</td>
					<td> 電影類型</td>
					<td> 上映日期</td>
					<td> 導演名稱</td>
					<td> 演員名稱</td>
					<td> 評等</td>
					<td> 評論數 </td>
					<td colspan='2'> 編輯</td>
					</tr>";

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
						$introduction = $a[6];
						$level = $a[7];
						$type = $a[8];
						$num_command = $a[9];
						$pic = $a[10];
						$video = $a[11];
					
						echo "<tr>
							<td> ",$movie_name," </td>
							<td> ",$type," </td>
							<td> ",$year,"年",$month,"月",$date,"日 </td>
							<td> ",$director_name," </td>
							<td> ",$actor_name," </td>
							<td> ",$level," </td>
							<td> ",$num_command,"</td>
					
							<td><form method = 'post' action = 'deleteMovie_do.php'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type = 'submit' value='刪除' >
								</form></td>
							<td><form method = 'post' action = 'updateMovie_do.php'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>									
									<input type= 'hidden' name='type' value='",$type,"'>
									<input type= 'hidden' name='year' value='",$year,"'>
									<input type= 'hidden' name='month' value='",$month,"'>
									<input type= 'hidden' name='date' value='",$date,"'>
									<input type= 'hidden' name='actor_name' value='",$actor_name,"'>
									<input type= 'hidden' name='introduction' value='",$introduction,"'>
									<input type= 'hidden' name='pic' value='",$pic,"'>
									<input type= 'hidden' name='video' value='",$video,"'>
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