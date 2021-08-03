<html lang="fa_IR" dir="rtl" prefix="og: https://ogp.me/ns#">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta http-equiv="X-UA-Compatible" content="IE=100"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>404</title>
    <meta http-equiv="content-language" content="fa">
    <meta name="robots" content="all"/>
    <meta name="generator" content="https://sincode.ir"/>
    <meta property="og:locale" content="fa_IR"/>
    <meta property="og:type" content="website"/>
    <link rel="icon" href="{{asset('assets/Front/image/favicon.png')}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/Front/image/favicon.png')}}"/>
    <link rel="apple-touch-icon" href="{{asset('assets/Front/image/favicon.png')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/bootstrap.min.css')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/font.css')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/style.css')}}"/>
    <link rel=stylesheet href="{{asset('assets/Front/css/sina.css')}}"/>
    <style>
        @font-face {font-family: QuranTaha;  src: url({{asset('assets/Front/fonts/QuranTaha.ttf')}});}
    </style>
</head>
<body id="body">
<a class="PG404" href="javascript:history.back()">
    <lottie-player src="{{asset('assets/Front/image/Gif404.json')}}" background="rgba(0,0,0,0)" speed="1" loop autoplay class="GifNotFound"></lottie-player>
    <h6>صفحه منقضی شده است.</h6>
    <h4>شما را دعوت به تلاوت آیه از قران کریم مینماییم</h4>
    <div class="ArabicQuote"></div>
</a>


<script src ="{{asset('assets/Bootstrap/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/Front/js/lottie-player.js')}}"></script>
<script>
    $(document).ready(function () {
        let arText;
        getQuote();
        function getQuote() {
            let ayah = Math.floor(Math.random() * 6236) + 1
            let urlArabic = "https://api.alquran.cloud/ayah/" + ayah;
            $.getJSON(urlArabic, function (data) {
                arText = data.data.text;
                $(".ArabicQuote").text(arText);
            });
        }
    });
</script>
</body>
</html>
