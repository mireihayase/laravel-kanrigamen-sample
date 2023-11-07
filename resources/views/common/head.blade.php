@section('head')
<meta charset="UTF-8">
<title>{{$title ?? ''}}/ {{$subtitle ?? ''}}</title>
<meta name="description" content="{{$description ?? ''}}">

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">


<!-- Core CSS -->
<link href="/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="/style/style.css" rel="stylesheet">


<!-- Custom CSS
<link href="" rel="stylesheet"> -->

<!-- Fonts -->
<link href="//fonts.googleapis.com/css?family=Lato:400,900,300,700" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Source+Sans+Pro:400,700,400italic,700italic" rel="stylesheet">

<!-- Favicon -->
<link rel="shortcut icon" href="/favicon.ico">

<style>
	body {
		background-color: #ffffff;
	}

	.navbar-header.top-navbar-header.main-top-nav {
		background-color: #283645;
	}
</style>
<!-- 郵便番号から住所出力 -->
<script src="{{ asset('/js/ajaxzip3.js') }}"></script>

@endsection