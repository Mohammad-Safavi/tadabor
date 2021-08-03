@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div style="margin-top: 3%" class="row">
            <div style="font-size: 13px !important;margin-bottom: 4%" class="col col-xl-2 col-md-3 col-12">
                <div class="category-box">
                    <p class="text-muted fs-6">دسته بندی ها</p>
                    <hr>
                    <ul class="category-form">
                        @foreach ($category as $category)
                            <form id="myform{{ $category->id }}" action="{{ Route('file') }}" method="get">
                                <input type="hidden" name="category" value="{{ $category->title }}">
                                <li><a href="#" onclick="document.getElementById('myform{{ $category->id }}').submit()"
                                        class="link link-secondary category-link {{ Request::input('category') == $category->title ? 'text-primary fw-bold' : '' }} ">{{ $category->title }}</a>
                                </li>
                            </form>
                        @endforeach
                    </ul>
                </div>
            </div>
            <br />
            <div style="font-size: 13px !important;" class="col col-xl-10 col-md-9 col-12 no-gutters">
                @if (count($course) == 0)
                    <div style="margin-top: 10%;font-size: 15px;text-align: center">فایلی وجود ندارد.</div>
                @else
                    <div class="row">
                        @foreach ($course as $courses)
                            <div class="col col-xl-6 col-md-6 col-12">
                                <a href="{{ Route('file.show', $courses->id) }}" class="card-deck">
                                    <div class="card card-box-file mb-3" style="width: 100%;">
                                        <div class="row g-0">
                                            <div class="col-md-4 col-5">
                                                <img style="height: 180px !important"
                                                    class="pic-card-course p-2 img-fluid rounded-start"
                                                    src="{{ asset('uploads/course-picture/' . $courses->name_pic) }}"
                                                    alt="Card image cap">
                                            </div>
                                            <div class="col-md-8 col-7">
                                                <div class="card-body">
                                                    <h6 class="fw-bold card-title">{{ $courses->title }}</h6><br>
                                                    <p class="text-secondary">
                                                        <svg xmlns="http://www.w3.org/2000/svg" height="20px"
                                                            viewBox="0 0 24 24" width="20px" fill="#575759">
                                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                                            <path
                                                                d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 9c2.7 0 5.8 1.29 6 2v1H6v-.99c.2-.72 3.3-2.01 6-2.01m0-11C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 9c-2.67 0-8 1.34-8 4v3h16v-3c0-2.66-5.33-4-8-4z" />
                                                        </svg> {{ $courses->teacher }}
                                                    </p>
                                                        @if ($courses->price == 0)
                                                            <p style="float: left;font-size: 15px"
                                                                class="card-text fw-bold text-success">رایگانـ</p>
                                                        @else
                                                            <p style="float: left;font-size: 15px"
                                                                class="card-text fw-bold text-success">
                                                                {{ number_format($courses->price) }} تومان</p>
                                                        @endif
                                                </div>
                                                <br><br>
                                                &nbsp;&nbsp;<small class="text-muted">{!! jdate($courses->updated_at)->format('%A, %d %B %Y') !!}</small>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        @endforeach
                    </div>
            </div>
            @endif
        </div>
    </div>
    <div style="margin-bottom: 4%" class="row">
        <div class="col col-xl-4"></div>
        <div class="col col-xl-4">
            {{ $course->links('pagination::bootstrap-4') }}
        </div>
        <div class="col col-xl-4"></div>
    </div>
    </div>
    <br><br>
    @include('site.layouts.footer')

@endsection
