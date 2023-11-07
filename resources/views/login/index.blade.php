<html>

<body>
	{{__("attributes.login.title")}}/{{__("attributes.login.subtitle")}}
	<form action="{{ url('login') }}" method="post" enctype="multipart/form-data">
		@csrf
		{{isset($message)?$message:''}}<br>
		{{__("attributes.login.login_id")}}：<input type="text" name="login_id" id="login_id" value="{{$login_id ?? ''}}"><br>
		{{__("attributes.login.login_pw")}}：<input type="password" name="login_pw" id="login_pw" value=""><br>
		<button type="submit">{{__("attributes.login.login_btn")}}</button>
	</form>
</body>

</html>