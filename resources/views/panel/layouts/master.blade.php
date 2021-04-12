<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>پنل مدیرت اندیشکده</title>
    <link rel="icon" type="image/x-icon" href="{{asset('img/favicon.ico')}}"/>
    <script  type="text/javascript" src="{{ asset('node_modules/tinymce/tinymce.js') }}"></script>
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/main.css')}}" rel="stylesheet" type="text/css"/>
</head>
<body class="sidebar-noneoverflow">
@yield('content')
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
    $(document).ready(function() {
        App.init();
    });
</script>
</body>
</html>
