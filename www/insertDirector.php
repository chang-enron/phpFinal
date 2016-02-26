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
		<form name = "apply" method="post" action="insertDirector_do.php">
			<p style="text-align : center;">新增導演</p>
			<p>名稱：<input type = "text" name = "director_name" required="required"/></p>
			<p>簡介：<input type = "text" name = "director_intro" required="required"/></p>
			<p>照片：<input type = "text" name = "pic" required="required"/></p>
	
			<p class = "right"><input type = "submit" value = "送出" /></p>
		</form>
	</div>
</body>