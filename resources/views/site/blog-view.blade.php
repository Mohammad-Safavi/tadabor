@extends('site.layouts.master')
@section('content')
    <meta charset=utf-8/>
    <meta name=description content="{{ mb_substr(strip_tags($blog->text ) ,0 ,170) }}{{$setting[0]->description}}">
    <meta name=keywords content="{{$blog->keyword}} , {{$setting[0]->keyword}}">
    <title>{{$blog->title}} | {{$setting[0]->name}}</title>
    </head>
    <body id=body>
    @include('site.layouts.header')
    <div style="text-align:justify;max-width: 100%" class="container">
        <br>
        <img src="{{asset('uploads/blog-picture/'. $blog->name_pic)}}" alt="عکس وجود ندارد." class="img-blog">
        <br>
        <h5 align="center">{{$blog -> title}}</h5>
        <br>
        <p>{!! $blog->text !!}</p>
        <br><br><br>
        <p style="font-size: 12px" class="text-muted">در دسته بندی : {{$blog->category}}</p>
        <p style="font-size: 12px" class="text-muted">تاریخ بروزرسانی وبلاگ :  {!! jdate($blog->updated_at)->format('%A, %d %B %Y') !!}</p>

    </div>

@endsection
