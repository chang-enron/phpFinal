<head>
<meta charset = "utf-8">
	<title>搭肩哥影評網</title>
	<style type = "text/css">
			p  {font-family : arial,sans-serif;}
			a  {text-decoration:none;}
			.right {text-align:right;}
		</style>
</head>
<body>
	<div style="position : absolute; left : 25%; background-color:#FFFF99;">
		<form name = "apply" method="post" action="insertActor_do.php">
			<p style="text-align : center;">新增演員</p>
			<p>請輸入演員名稱：<input type = "text" name = "actor_name" required="required"/></p>
			<p>請輸入演員簡介：<input type = "text" name = "actor_intro" required="required"/></p>
			<p>請輸入演員影片網址：<input type = "text" name = "pic" required="required"/></p>
	
			<p class = "right"><input type = "submit" value = "送出" /></p>
		</form>
	</div>
</body>