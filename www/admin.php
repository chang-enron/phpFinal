<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();
	$user_id = $_SESSION['user_id'];
	$level = $_SESSION['level'];
?>
<html>
	<head>
		<meta charset="utf-8">
		<title>搭肩哥影評網</title>
		<style>
	
		body            {
							font-family:微軟正黑體,標楷體;
							background-color:white;
						}
		h1				{
							float:left;
							vertical-align:top;
							border:1px black;
							width:20%;
							padding:0;
							margin:0;
						}
		nav            {
							font-family:微軟正黑體;
							font-weight: bold;
							color: white;
						
							border: 1px  black;
							background-color: black;
							text-align: center;
				
						}
		nav  ul     	{
						display:none;
						list-style:none;
						margin:0;
						padding:0;
						}
		nav:hover ul	{display:block;}
		h1 nav:hover			{ background-color:#FA8000;}
			
		nav  ul li 	 {
						border-top:1px ;
						background-color:#FA8000;
						color:white;
					 }
		nav  ul li:hover 	{
						background-color:#DC7100;
							}
		
		h2            {
						color:white;
						background-color:#FF8F19;
						width:100%;
						padding:0;
						margin:0;
					 }
		form		{
							padding:0;
							margin:0;
						}
		p     			{	padding:0;
							margin:0;
							
							background-color:#FDFF73;
							text-align: center;
							
						}
		h3          {
							float:right;
							width:20%;
							padding:0;
							margin:0;
						}
		
	.floatright  {
							float:right;
						}
	.background {
								background-color:#19FF1C;
							}
			</style>
	<script>
			function start()
			{
				var i;
					var changepage = document.getElementById("changepage");
					changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='movie_admin.php'></iframe>";
				
				for(var i=1; i<8; i++)
				{
					if(i == 1)document.getElementById(i).addEventListener("click", movie_insert, false);
					if(i == 2)document.getElementById(i).addEventListener("click", movie_admin, false);
					if(i == 3)document.getElementById(i).addEventListener("click", director_insert, false);
					if(i == 4)document.getElementById(i).addEventListener("click", director_admin, false);
					if(i == 5)document.getElementById(i).addEventListener("click", actor_insert, false);
					if(i == 6)document.getElementById(i).addEventListener("click", actor_admin, false);
					if(i == 7)document.getElementById(i).addEventListener("click", command_admin, false);
				}
			}
			function movie_insert()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='insertMovie.php'></iframe>";
			}
			function movie_admin()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='movie_admin.php'></iframe>";
			}
			function director_insert()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='insertDirector.php'></iframe>";
			}
			function director_admin()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='director_admin.php'></iframe>";
			}
			function actor_insert()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='insertActor.php'></iframe>";
			}
			function actor_admin()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='actor_admin.php'></iframe>";
			}
			function command_admin()
			{
				var changepage = document.getElementById("changepage");
				changepage.innerHTML ="<iframe style = 'width:100%;height:70%;border:0 ' src='command_admin.php'></iframe>";
			}
			window.addEventListener( "load", start, false);
			</script>
	</head>
<body>	
	<h2><font size='50px'>搭肩哥影評網-管理介面</font></h2>
	<h3  >
		<p><? echo $user_id; ?>, 你好</p>
		<p><a href = "home.php">返回首頁</a></p>	
	</h3>
	<table>
		<h1><nav><div >Movie</div>
			<ul>
				<li><div id='1'>新增</div></li>
				<li><div id='2'>管理</div></li>
			</ul></nav></h1>
		<h1><nav>Director
				<ul>
					<li><div id='3'>新增</div></li>
					<li><div id='4'>管理</div></li>
				</ul>
			</nav></h1>
		<h1><nav>Actor
				<ul>
					<li><div id='5'>新增</div></li>
					<li><div id='6'>管理</div></li>
				</ul>
			</nav></h1>
		<h1><nav>Command
				<ul>
					<li><div id='7'>管理</div></li>
				</ul>
			</nav></h1>

	</table>
			
		<div  id= "changepage"></div>
	</body>
</html>