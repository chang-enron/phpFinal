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
	$sql = "select *from actor;";	
	$data = mysql_query($sql);
	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>搭肩哥影評網</title>
		<style type = "text/css">
		body {background-color:#CCDDFF}
		</style>
	</head>
	<body>
		<table border="1">			
			
			
			<tr>
					<td></td>
					<td> 演員</td>					
					<td> 詳細資訊 </td>					
					</tr>
<?PHP
				while(true)
				{
				
					$a = mysql_fetch_row($data);
					if($a)
					{
						
						$actor_name = $a[0];					
						$actor_intro = $a[1];
						$pic= $a[2];
					
						echo "<tr>
							<td width='10%'><img src='$pic' width='100%' height='10%'></td>
							<td> ",$actor_name," </td>
									
							<td><form method = 'post' action = 'actor_detail.php'>
									<input type= 'hidden' name='actor_name' value='",$actor_name,"'>
									<input type = 'submit' value='More...' >
							
								</form></td>
						</tr>";
					}
					else break;
				}
			?>
			
		</table>
	</body>
</html>