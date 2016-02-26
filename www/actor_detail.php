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
	
	if($_POST['actor_name'])
	{		
		
		$actor_name = $_POST['actor_name'];
	}
	else
	{

		$actor_name = $_SESSION['actor_name'];
	}
	
	$sql = "select * from actor where actor_name='$actor_name' ;";
	$data = mysql_query($sql);
	$a = mysql_fetch_row($data);
	


	
?>
<html>
	<head>
		<meta charset = "utf-8">
		<title>搭肩哥影評網</title>
		<style type = "text/css">
		
		<style type = "text/css">
			p  {font-family : arial,sans-serif;}
			a  {text-decoration:none;}
			.right {text-align:right;}
			
		</style>
		</style>
	</head>
	<body>
		<table>
			<?PHP
				if($a)
				{
					$actor_name = $a[0];					
					$actor_intro = $a[1];
					$pic = $a[2];
					
					echo "<tr>		
						<td width='10%'><img src='$pic' ></td>
						<tr><td>演員: ",$actor_name,"</td></tr>						
						<tr><td>簡介: ",$actor_intro,"</td></tr>";
				}
			?>

		</table>
		
			</body>
</html>