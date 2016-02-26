<?php
	$movie_name = $_POST['movie_name'];
	$director_name = $POST['director_name'];
echo '
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
		<form method="post" action="insertCommand_do.php">
			<p style="text-align : center;">新增',$movie_name,'評論</p>
			<p>請輸入評論內容：<input type = "text" name = "command" required="required"/></p>
			<p>請輸入評分：<input type = "text" name = "level" required="required"/></p>
			<input type = "hidden" name = "movie_name" value = "',$movie_name,'"/>
			<input type = "hidden" name = "director_name" value = "',$director_name,'"/>
			<p class = "right"><input type = "submit" value = "送出" /></p>
		</form>
	</div>
</body>';

?>
