@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div style="margin-top: 3%" class="row">
            <div style="font-size: 13px !important;margin-bottom: 4%" class="col col-xl-2 col-md-3 col-12">
                <h6>دسته بندی ها</h6>
                <br>
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action {{ Request::is('file') && !Request::input('category') ? 'active' :'' }}"
                        href="{{Route('file')}}">همه موارد</a>
                    <br>
                    @foreach ($category as $category)
                        <form id="myform" class="" style="margin-top: -14px" action="{{ Route('file') }}" method="get">
                            <input type="hidden" name="category" value="{{ $category->title }}">
                            <input type="submit" class="list-group-item list-group-item-action {{ (Request::input('category') == $category->title) ? 'active' : '' }} "
                                value="{{ $category->title }}">
                        </form>
                    @endforeach
                </div>
            </div>
            <br />
            <div style="font-size: 13px !important;" class="col col-xl-10 col-md-9 col-12 no-gutters">
                @if (count($course) == 0)
                    <div style="margin-top: 10%;font-size: 15px;text-align: center">دوره ای وجود ندارد.</div>
                @else
                    <div class="row">
                        @foreach ($course as $courses)
                            <div class="col col-xl-6 col-md-6 col-12">
                                <a href="{{ Route('file.show', $courses->id) }}" class="card-deck">
                                    <div class="card mb-3" style="width: 500px;">
                                        <div class="row g-0">
                                            <div class="col-md-4">
                                                <img style="display:block;height: 180px !important; object-fit:cover;"
                                                    class="card-img-top img-fluid rounded-start"
                                                    src="{{ asset('uploads/course-picture/' . $courses->name_pic) }}"
                                                    alt="Card image cap">
                                            </div>
                                            <div class="col-md-8">
                                                <div class="card-body">
                                                    <h6 class="fw-bold card-title">{{ $courses->title }}</h6><br>
                                                    <p>{{ $courses->teacher }}</p>
                                                    @if ($courses->price == 0)
                                                        <p style="float: left; font-weight: bold;font-size: 15px"
                                                            class="card-text">رایگانـ</p>
                                                    @else
                                                        <p style="float: left; font-weight: bold;font-size: 15px"
                                                            class="card-text">{{ number_format($courses->price) }} تومان
                                                        </p>
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
