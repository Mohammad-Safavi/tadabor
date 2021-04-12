@extends('site.layouts.master')
@section('content')
    <meta charset=utf-8/>
    <meta name=description content="وبلاگ اندیشکده و پژوهشکده قرآنی تدبر {{$setting[0]->description}}">
    <meta name=keywords content=", {{$setting[0]->keyword}} وبلاگ, وبلاگ های قرآنی , وبلاگ تدبر , اندیشکده وبلاگ">
    <title>وبلاگ اندیشکده | {{$setting[0]->name}}</title>
    @include('site.layouts.header')
    <div class="container">

        <br>
        <div style="margin-top: 3%" class="row">
            <div style="font-size: 13px !important;margin-bottom: 4%"  class="col col-xl-4 col-12">
                <h6>دسته بندی ها</h6>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action {{ Request::is('blog') ? 'active' : '' }}"   href="http://localhost:8000/blog" >همه موارد</a>
                <br>@foreach($category as $category)
                  <form id="myform" style="margin-top: -14px"  action="{{Route('blog.filter')}}" method="get">
                      <input type="hidden" name="category" value="{{$category->title}}">
                      <input type="submit" class="list-group-item list-group-item-action" value="{{$category->title}}" >
                  </form>
             @endforeach
                </div>
            </div>
           <br />
            <div style="font-size: 13px !important;"  class="col col-xl-8 col-12 no-gutters">
                @if(count($blog) == 0)
                    <div style="margin-top: 10%;font-size: 15px;text-align: center">وبلاگی وجود ندارد.</div>
                @else
            @foreach($blog as $blogs)
                    <a href="{{Route('blog.show', $blogs->id)}}" style="width: 100%;text-decoration: none;color: black" class="card-deck">
                        <div class="card">
                            <img style="display:block;height: 400px; object-fit:cover;" class="card-img-top" src="{{asset('uploads/blog-picture/'. $blogs ->name_pic)}}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{$blogs->title}}</h5>
                                <p class="card-text">{!! mb_substr($blogs->text  ,0 ,520 ) . '......' !!}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">در دسته {{$blogs->category}}</small>
                                 | <small class="text-muted">تاریخ ویرایش : {!! jdate($blogs->updated_at)->format('%A, %d %B %Y') !!}</small>
                            </div>
                        </div>
                    </a><br>
            @endforeach
                @endif
            </div>
        </div>
            <div style="margin-bottom: 4%" class="row">
                <div class="col col-xl-4"></div>
                <div class="col col-xl-4">
                    {{$blog->links('pagination::bootstrap-4')}}
                </div>
                <div class="col col-xl-4"></div>
            </div>
    </div>

@endsection
{{--<div  class="card" style="height: 31rem;position: relative;border-radius: 12px;padding: 4%;margin-bottom: 3%">--}}
{{--    <img style="height: 25rem;position: relative;border-radius: 12px" class="card-img-top" src="{{asset('uploads/blog-picture/'. $blog->name_pic)}}" alt="Card image cap">--}}
{{--    <div style="font-size: 13px !important;"  class="card-body">--}}
{{--        <h5 class="card-title">{{$blog->title}}</h5>--}}
{{--        <div class="ellipsis">--}}
{{--            <p  class="card-text">{!!$blog->text!!}</p>--}}
{{--        </div>--}}
{{--        <br>--}}
{{--        <a style="text-decoration: none;position: absolute;bottom: 24;left: 20" href="{{Route('blog.show', $blog->id)}}">ادامه مطلب...</a><br>--}}
{{--        <p style="position: absolute;bottom: 12;"  class="card-text"><small class="text-muted">در دسته {{$blog->category}}</small></p>--}}
{{--    </div>--}}
{{--</div>--}}
