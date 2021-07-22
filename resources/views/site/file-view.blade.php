@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    @include('panel.layouts.messagesystem')
    <div class="container">
        <div class="row mt-5">
            <div style="order:2" class="col col-xl-8 col-lg-8 col-course">
                <div class="div-img-course">
                    <img class="img-course" src="{{ asset('uploads/course-picture' . $course->name_pic) }}"
                        alt="{{ $course->title }}">
                </div>
                <br>
                <div class="course-title">
                    <h4>{{ $course->title }}</h4>
                </div>
                <hr>
                <div align="justify" class="course-text">
                    {!! $course->description !!}
                </div>
                <hr>
                @foreach ($file as $files)
                    @if (Auth::check())
                        <div class="alert alert-info">
                            @if ($course->price == 0 || $files->price == 1 || $status == 1)
                                <div>
                                    <a class="btn btn-success" target="_blank" download="{{ $files->name }}"
                                        href="{{ asset('uploads/course-file' . $files->file) }}">دانلود
                                        فایل</a>
                                </div>
                            @else
                                <div class="text-primary">برای دسترسی به این فایل کافیست فایل را تهیه کنید.
                                </div>
                            @endif
                        </div>
                    @else
                    @endif
            @endforeach
        </div>

            <div class="col col-xl-3 col-lg-3  col-12 col-course col-des-course">
                <div style="display: flex !important">
                    <div align="right" class="w-50">
                        <p>$ قیمت فایل :</p>
                        <p>مدرس :</p>
                        <p>تعداد اعضا :</p>
                        <p>مدت زمان :</p>
                        <p>تاریخ بارگزاری:</p>
                    </div>
                    <div align="left" class="w-50 text-dark">
                        @if ($course->price == 0)
                            <p>رایگانـ</p>
                        @else
                            <p class="fw-bold text-success">{{ number_format($course->price) }} تومان</p>
                        @endif
                        <p>{{ $course->teacher }}</p>
                        <p>{{ $total_student }} عدد</p>
                        <p>NONE </p>
                        <p>{!! jdate($course->updated_at)->format('%d %B %Y') !!}</p>
                    </div>
                </div>
                <br>
                @if ($status == 1)
                    <div class="alert alert-info w-100">شما این فایل را تهیه کرده اید.</div>
                @elseif($course->price == 0)
                    <div class="alert alert-warning w-100">این دوره رایگان است.</div>
                @else
                    @if (Auth::check())
                        <form action="{{ Route('add.cart', $course->id) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-success w-100">افزودن به سبد خرید</button>
                        </form>
                    @else
                        <button class="btn btn-light w-100 disabled">ابتدا وارد حساب خود شوید.</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
