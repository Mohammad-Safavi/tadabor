@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div style="margin-top: 3%" class="row">
            <div style="font-size: 13px !important;margin-bottom: 4%" class="col col-xl-2 col-md-3 col-12 ">
                <h6>دسته بندی ها</h6>
                <br>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action {{ Request::is('blog') ? 'active' : '' }}"
                       href="http://localhost:8000/blog">همه موارد</a>
                    <br>@foreach($category as $category)
                        <form id="myform" class="" style="margin-top: -14px" action="{{Route('blog.view')}}"
                              method="get">
                            <input type="hidden" name="category" value="{{$category->title}}">
                            <input type="submit" class="list-group-item list-group-item-action "
                                   value="{{$category->title}}">
                        </form>
                    @endforeach
                </div>
            </div>
            <br/>
            <div style="font-size: 13px !important;" class="col col-xl-10 col-md-9 col-12 no-gutters">
                @if(count($blog) == 0)
                    <div style="margin-top: 10%;font-size: 15px;text-align: center">وبلاگی وجود ندارد.</div>
                @else
                    <div class="row">
                        @foreach($blog as $blogs)
                            <a href="{{Route('blog.show', $blogs->id)}}" class="card-deck">
                                <div class="blog">
                                    <div class="row g-0">
                                        <div class="col-md-2 col-4 pic-div-blog">
                                            <img class="card-img-top pic-blog"
                                                 src="{{asset('uploads/blog-picture/'. $blogs ->name_pic)}}"
                                                 alt="Card image cap">
                                        </div>
                                        <div class="col-md-10 col-8">
                                            <div class="card-body">
                                                <h5 class="card-title">{{$blogs->title}}</h5>
                                                <small
                                                    class="text-muted">{!! jdate($blogs->updated_at)->format('%A, %d %B %Y') !!}</small>
                                                <p align="justify"
                                                   class="card-text tx-card-1">{!! strip_tags(mb_substr($blogs->text  ,0 ,400 )) . '......' !!}</p>
                                                <p align="justify"
                                                   class="card-text tx-card-2">{!! strip_tags(mb_substr($blogs->text  ,0 ,100 )) . '......' !!}</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
            @endif
            </div>

        </div>
    </div>
    <div style="margin-bottom: 4%" class="row">
        <div class="col col-xl-4"></div>
        <div class="col col-xl-4">
            {{$blog->links('pagination::bootstrap-4')}}
        </div>
        <div class="col col-xl-4"></div>
    </div>
    @include('site.layouts.footer')

@endsection
