<? 
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
	session_start();
	$user_id = $_SESSION['user_id'];
	$username = $_SESSION['username'];
	
	if($_POST['movie_name'])
	{
		$movie_name = $_POST['movie_name'];
		$director_name = $_POST['director_name'];
	}
	else
	{
		$movie_name = $_SESSION['movie_name'];
		$director_name = $_SESSION['director_name'];
	}
	
	$sql = "select * from movie where movie_name='$movie_name' ;";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	


	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>搭肩哥影評網</title>
		<style type = "text/css">
		table {  background-color:#FFCC22;
					font-family:微軟正黑體;
					font-weight:bolder;}
			
		</style>
		</style>
	</head>
	<body>
		<table >
			<?PHP
				if($a)
				{
					$year = $a[1];
					$month = $a[2];
					$date = $a[3];
					$actor_name = $a[5];
					$introduction = $a[6];
					$level = $a[7];
					$type = $a[8];
					$num_command = $a[9];
					$pic=$a[10];
					$video=$a[11];
					echo "
					<tr>
							<td>電影名稱: ",$movie_name,"</td>
							<td>類型: ",$type,"</td>
						</tr>
						<tr>
							<td>上映日期: ", $year,"/", $month,"/", $date, "</td>
							<td>評分: ", $level,"</td>
						</tr>
						<tr><td>導演: ",$director_name,"</td></tr>
						<tr><td>演員: ",$actor_name,"</td></tr>
						<tr><td>簡介: ",$introduction,"</td></tr>
						<tr><td><img src='$pic' width='60%' height='60%'></td></tr>
						<iframe width='560' height='315' src='$video' frameborder='0' allowfullscreen></iframe>"
						;
						
				}
			?>

		
		<tr>
			<td colspan="2">影評共<? echo $num_command ?>則</td>
			<? if($user_id){?>
			
			<td ><form method="post" action ="insertCommand.php">
					<input type = 'submit' value = "新增評論"/>
					<input type = "hidden" name = "movie_name" value = <? $movie_name ?>/>
					<input type = "hidden" name = "director_name" value = <? $director_name ?>/>
				</form>
			</td>
			<td><a href='home.php'>回首頁</a></td>
			<? }?>
		</tr>
		</table>
	
		<table border="1" style="background-color:#FFFF99;">
				
			<!-- 連資料庫去找評論 -->
			<?
					$sql2 = "select * from command where movie_name='$movie_name' and director_name = '$director_name';";
					$data2 = mysql_query($sql2);
				while($data2)
				{
					$com = mysql_fetch_row($data2);
					if($com)
					{
						$command_code = $com[0];
						$id = $com[1];
						$movie_name = $com[2];
						$director_name = $com[3];
						$command = $com[4];
						$level_c = $com[5];
						
						
						echo "
							<tr>
							<td> 會員: ",$id," </td>
							<td> 評分: ",$level_c," </td></tr>
							<tr><td colspan='2'>評價:",$command,"</td></tr>";
						if($id == $user_id)
						{
							echo "<tr><td><form method = 'post' action = 'deleteCommand_do.php'>
									<input type= 'hidden' name='command_code' value='",$command_code,"'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type= 'hidden' name='level' value='",$level,"'>
									<input type = 'submit' value='刪除' >
								</form></td>
							<td><form method = 'post' action = 'updateCommand_do.php'>
									<input type= 'hidden' name='command_code' value='",$command_code,"'>
									<input type= 'hidden' name='id' value='",$id,"'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type= 'hidden' name='command' value='",$command,"'>
									<input type= 'hidden' name='level' value='",$level,"'>
									<input type = 'submit' value='修改' >
								</form></td></tr>";
						}
					}
					else break;
				}
			?>
			
			</table>
	</body>
</html>