<!DOCTYPE html>
<html lang="kr">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>sale31 판매관리</title>
    <link   href="{{ asset('my/css/bootstrap.min.css') }}" rel="stylesheet">
	<link   href="{{ asset('my/css/my.css') }}" rel="stylesheet">
    <script src="{{ asset('my/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('my/js/popper.min.js') }}"></script>
    <script src="{{ asset('my/js/bootstrap.min.js') }}"></script>
	
	<script src="{{ asset('my/js/moment-with-locales.min.js') }}"></script>
	<script src="{{ asset('my/js/bootstrap5-datetimepicker.js') }}"></script>
	<link   href="{{ asset('my/css/bootstrap5-datetimepicker.css') }}" rel="stylesheet">
	<link   href="{{ asset('my/css/all.min.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
       
		
<!--		content 시작				 -->
		
		@yield("content")
		
<!--		content 끝				 -->
    </div>
</body>
</html>
