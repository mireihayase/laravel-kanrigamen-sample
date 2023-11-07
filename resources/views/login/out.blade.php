<html>

<body>
	{{isset($title)?$title:''}}/{{isset($subtitle)?$subtitle:''}}<br>

	<form action="login">
		@csrf
		{{isset($login_id)?$login_id:''}}
		<button type="submit">戻る</button>
	</form>

</body>

</html>