<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	$user_id = $_SESSION['user_id'];
	$level = $_SESSION['level'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>影評</title>
		<style>
	li					{
							font-size:20px;
							
							}
	
		body      {
							cursor: default; 
							padding:0;
							margin:0;
							font-family:微軟正黑體,標楷體;
							background-color:lightblue;
							
						}
		h1:hover			{ background-color:#FA8000;}
			
		form		{
							padding:0;
							margin:0;
						}
		h1				{
							cursor: pointer; 
							font-weight: bold;
							color: white;
							font-size:30px;
							float:left;
							vertical-align:top;
							text-align: center;
							background-color: black;
							width:20%;
							padding:0;
							margin:0;
						}
		h2            {
						color:#FF0088;
						width:100%;
						padding:0;
						margin:0;
						height:10%;
					 }
						
	h3          {
							font-family:微軟正黑體;
							float:right;
							width:20%;
							padding:0;
							margin:0;
							cursor: pointer; 
							background-color:#E8CCFF;
						}
	h1:hover	{

							background-color:pink;
							color:black;
						}
	
	
	h5             {
							font-size:25px;
							background-color:pink;
							float:left;
							width:11.428571%;
							height:10%;
							padding:0;
							margin:0;
							cursor: pointer; 
						}

	h6           {
							font-size:30px;
							color:#FF0088;
						}
	a					{
							
							background-color:white;
							font-weight:bold;
							font-family:微軟正黑體,標楷體;
							color:#FF8F19;
							text-align: center;
							text-decoration:none;
						}
	XD:hover h5	{
									display:block;
								}
								
	XD:hover h1  {
									background-color:pink;
									color:black;
								}
	XD      {}
	XD  h5	{ display:none;}
	h5 w:hover {
								color:white;
								background-color:#00DDAA;
								
							}
w {}
			</style>
	<script>
			function start()
			{
				var i=0;
				if(i == 0){
					var changepage = document.getElementById("changepage");
					changepage.innerHTML ="<iframe style = 'width:80%;height:90%; border:0' src='homepage.php'></iframe>";
				}
				for(var i=1; i<11; i++)
				{
					if(i == 1)document.getElementById(i).addEventListener("click", Lovefilms, false);
					if(i == 2)document.getElementById(i).addEventListener("click", Actionfilms, false);
					if(i == 3)document.getElementById(i).addEventListener("click", Comedyfilms, false);
					if(i == 4)document.getElementById(i).addEventListener("click", Mysteryfilms, false);
					if(i == 5)document.getElementById(i).addEventListener("click", Thrillerfilms, false);
					if(i == 6)document.getElementById(i).addEventListener("click", Dramafilms, false);
					if(i == 7)document.getElementById(i).addEventListener("click", Animatedfilms, false);
				    	if(i == 8)document.getElementById(i).addEventListener("click", Actor, false);
					if(i == 9)document.getElementById(i).addEventListener("click", Director, false);
					if(i == 10)document.getElementById(i).addEventListener("click", start, false);
				}
			}
			function Lovefilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='love.php'></iframe>";
			}
			function Actionfilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Actionfilms.php'></iframe>";
			}
			function Mysteryfilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Mysteryfilms.php'></iframe>";
			}
			function Comedyfilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Comedyfilms.php'></iframe>";
			}
			function Thrillerfilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Thrillerfilms.php'></iframe>";
			}
			function Dramafilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Dramafilms.php'></iframe>";
			}
			function Animatedfilms()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='Animatedfilms.php'></iframe>";
			}
function Actor()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='actorPage.php'></iframe>";
			}
			function Director()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:80%;height:200%;border:0 ' src='directorPage.php'></iframe>";
			}
			window.addEventListener( "load", start, false);
			</script>
	</head>
<body>	
	<h2><font size='50px'>電影影評網</font></h2>
	<h3>
	<?  if(!$_SESSION['user_id'])
			echo "<a href='Login.php'>會員登入 Login</a>";
		else 
		{
			echo "<a>你好, ",$user_id,"</a><br>";
			if($level >0 )
			{
				echo "<a href='admin.php'>管理介面</a><br>";
			}
			echo "<a href = 'logOut.php'>登出</a>";
		}
	?>
		<form method="post" action = "searchMovie_do.php">	
			<label >
				<input name="movie_name" type autofocus size ="25%" placeholder="電影名稱" required>
				<input type="submit" value="搜尋">
			</label>
		</form>
		<form method='post' action ="searchActor_do.php">

			<label >
				<input name="actor_name"  size ="25%" placeholder="演員名稱" required>
				<input type="submit" value="搜尋"><br>
			</label>
			</form>
		<form	 method='post' action ="searchDirector_do.php">
			<label>
				<input name="director_name"  size ="25%" placeholder="導演名稱" required>
				<input type="submit" value="搜尋">
			</label>
		</form>
		<a href='http://www.taiwancinema.com/CH'><img src='tai.png' width='100%' height='20%'></a>
		<a href='http://www.kff.tw/home03.aspx?ID=3' ><img src='kao.jpg' width='100%' height='20%'></a>
		<a href='http://www.taipeiff.org.tw/' ><img src='1.png' width='100%' height='20%'></a>
		<a href='http://www.imdb.com/' ><img src='imdb.png' width='100%' height='20%'></a>
		</h3>
			<h1 ><div   id='10' >首頁 Home Page</div></h1>
			<h1><div id = '8'>演員 Actor</div></h1>
			<h1><div id = '9'>導演 Director</div></h1>
			<XD><h1>分類檢索</h1>
			<h5 ><w id='1' style="display:inline;" ><h6 style="display:inline;">L</h6>ove</w></h5>
			<h5><w  id='2' style="display:inline;"><h6 style="display:inline;">A</h6>ction</w></h5>
			<h5 ><w id='3' style="display:inline;"><h6 style="display:inline;">C</h6>omedy</w></h5>
			<h5><w id="4" style="display:inline;"><h6 style="display:inline;">M</h6>ystery</w></h5>
			<h5><w  id="5" style="display:inline;"><h6 style="display:inline;">T</h6>hriller</w></h5>
			<h5><w id="6" style="display:inline;"><h6 style="display:inline;">D</h6>rama</w></h5>
			<h5><w id="7" style="display:inline;"><h6 style="display:inline;">A</h6>nimated</w></h5></XD>
	
			
		<div  id= "changepage"></div>
	</body>
</html>
		
		