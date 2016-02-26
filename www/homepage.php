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
	$sql = "select *from movie order by year desc,month desc,date desc;";	
	$data = mysql_query($sql);
	$B=mktime(0,0,0,date("m"),date("d"),date("Y")) ;
	
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
			<font size ="7" color ="red"><b>最新電影</b></font>
			
			<tr><td></td>
					<td> 電影名稱</td>
					<td> 電影類型</td>
					<td> 上映日期</td>
					<td> 導演名稱</td>
					<td> 演員名稱</td>
					<td> 評等</td>
					<td> 評論數 </td>
					<td> 詳細內容 </td>					
					</tr>
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
						$introduction = $a[6];
						$level = $a[7];
						$type = $a[8];
						$num_command = $a[9];
						$pic=$a[10];
						$A=mktime(0,0,0,$month,$date,$year);
						$B=mktime(0,0,0,date("m"),date("d"),date("Y")) ;
						$Days = round(($B-$A)/3600/24);
						if($Days<30 && $Days>(-30))
						{										
							echo "<tr>
							<td width='10%'><img src='$pic' width='100%' height='20%'></td>
							<td> ",$movie_name," </td>
							<td> ",$type," </td>
							<td> ",$year,"年",$month,"月",$date,"日 </td>
							<td> ",$director_name," </td>
							<td> ",$actor_name," </td>
							<td> ",$level," </td>
							<td> ",$num_command,"</td>
							<td><form method = 'post' action = 'detail.php'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type = 'submit' value='詳細資料' >
							
								</form></td>
							</tr>";
						}
						
					else break;
				}			
			}			
			?>
		</table>
			<font size ="7" color ="#FF8800"><b>歷年電影總覽</b></font>
			<table border="1">
			<tr>
					<td></td>
					<td> 電影名稱</td>
					<td> 電影類型</td>
					<td> 上映日期</td>
					<td> 導演名稱</td>
					<td> 演員名稱</td>
					<td> 評等</td>
					<td> 評論數 </td>
					<td> 詳細內容 </td>					
					</tr>
<?PHP			
	$sqs = "select *from movie order by year desc,month desc,date desc;";	
	$dats = mysql_query($sqs);
				while(true)
				{
				
					$b = mysql_fetch_row($dats);
					if($b)
					{
						$movie_name = $b[0];
						$year = $b[1];						
						$month = $b[2];
						$date = $b[3];
						$director_name = $b[4];
						$actor_name = $b[5];
						$introduction = $b[6];
						$level = $b[7];
						$type = $b[8];
						$num_command = $b[9];
						$pic=$b[10];
						$C=mktime(0,0,0,$month,$date,$year);
						
						$Days = round(($B-$C)/3600/24);
																
							echo "<tr>
							<td width='10%'><img src='$pic' width='100%' height='20%'></td>
							<td> ",$movie_name," </td>
							<td> ",$type," </td>
							<td> ",$year,"年",$month,"月",$date,"日 </td>
							<td> ",$director_name," </td>
							<td> ",$actor_name," </td>
							<td> ",$level," </td>
							<td> ",$num_command,"</td>
							<td><form method = 'post' action = 'detail.php'>
									<input type= 'hidden' name='movie_name' value='",$movie_name,"'>
									<input type= 'hidden' name='director_name' value='",$director_name,"'>
									<input type = 'submit' value='詳細資料' >
							
								</form></td>
							</tr>";
						
					}	
					else break;
				}
			
			
			?>
			</table>
	</body>
</html>