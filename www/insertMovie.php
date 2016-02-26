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
		<form name = "apply" method="post" action="insertMovie_do.php">
			<p style="text-align : center;">新增電影</p>
			<p>請輸入電影名稱：<input type = "text" name = "movie_name" required="required"/></p>
			<p>請輸入上映年：<input type = "number" name = "year" min = "1976" max = "2050" step = "1" value = " " required/></p>
			<p>請輸入上映月：<input type = "number" name = "month" min = "1" max = "12" step = "1" value = " " required/></p>
			<p>請輸入上映日：<input type = "number" name = "date" min = "1" max = "31" step = "1" value = " " required="required"/></p>
			<p>請輸入導演：<input type = "text" name = "director_name" required="required"/></p>
			<p>請輸入領銜主演：<input type = "text" name = "actor_name" required="required"/></p>
			<p>請輸入簡介：<input type = "text" name = "introduction" required="required"/></p>
			<p>請選擇類型：
				<select name = "type">
					<option value="love">愛情</option>
					<option value="action">動作</option>
					<option value="comedy">喜劇</option>
					<option value="mystery">懸疑</option>
					<option value="thriller">驚悚</option>
					<option value="drama">劇情</option>
					<option value="animated">動畫</option>
				</select></p>
			<p>請輸入圖片連結：<input type="text" name = "pic" required = "required"/></p>
			<p>請輸入預告片(youtube)連結：<input type ="text" name ="video" required= "required"/></p>
			<p class = "right"><input type = "submit" value = "送出" /></p>
		</form>
	</div>
</body>