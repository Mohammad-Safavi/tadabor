<html lang="fa_IR" dir="rtl" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="X-UA-Compatible" content="IE=100"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
{{--    <meta name=description content="{{$setting[0]->description}}{{$description}}">--}}
{{--    <meta name=keywords content="{{$setting[0]->keyword}},{{$keyword}}">--}}
    {!! SEOMeta::generate() !!}
    {{--    <meta http-equiv="content-language" content="fa">--}}
{{--    <meta name="robots" content="all"/>--}}
{{--    <meta name="generator" content="https://sincode.ir"/>--}}
{{--    <meta property="og:locale" content="fa_IR"/>--}}
{{--    <meta property="og:type" content="website"/>--}}
{{--    <meta property="og:title" content="{{$setting[0]->name}} - {{$page_name}}"/>--}}
{{--    <meta itemprop="name" content="{{$setting[0]->name}}">--}}
{{--    <meta itemprop="description" content="{{$setting[0]->description}}">--}}
{{--    <meta property="og:url" content="{{asset('')}}"/>--}}
{{--    <meta property="og:description" content="{{$setting[0]->description}}"/>--}}
{{--    <meta property="og:site_name" content="{{$setting[0]->name}}"/>--}}
    <link rel="icon" href="{{asset('assets/Front/image/favicon.png')}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/Front/image/favicon.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/Front/image/favicon.png')}}" />
    <link rel=stylesheet href="{{asset('assets/Bootstrap/css/bootstrap.min.css')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/sina.css')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/font.css')}}"/>
    <link href="{{asset('assets/Back/css/snackbar.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/Front/css/form-2.css')}}" rel="stylesheet" type="text/css"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/style.css')}}"/>


</head>
<body style="position: relative !important;" id="body">
<div id="loader" class="loader-div">
    <div class="loader"></div>
</div>
    @yield('content')
    <script src ="{{asset('assets/Bootstrap/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/Bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/Front/js/custom.js')}}"></script>
    <script src="{{asset('assets/Back/js/snackbar.min.js')}}"></script>
    <script src="{{asset('assets/Front/js/app.js')}}"></script>

</body>
</html>
