@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    @include('panel.layouts.messagesystem')
    <div class="container">
        <div class="row mt-5">
            <div style="order:2" class="col col-xl-8 col-lg-8 col-12">
                <div class="col-course">
                    <div class="div-img-course">
                        <img class="img-course" src="{{ asset('uploads/course-picture' . $course->name_pic) }}"
                            alt="{{ $course->title }}">
                    </div>
                    <div class="course-title">
                        <h5 class="fw-bold">{{ $course->title }}</h5>
                    </div>
                    <br>
                </div>
                <div class="col-course mt-3">
                    <div align="justify" class="course-text">
                        {!! $course->description !!}
                    </div>
                </div>
                @if (count($file) == 0)
                @else
                    <div class="col-course mt-3">
                        <div class="accordion accordion-flush bg-light" id="accordionFlushExample">
                            @foreach ($file as $files)
                                <div class="accordion-item">
                                    @if (Auth::check())
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed" type="button"
                                                data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $files->id }}" aria-expanded="false"
                                                aria-controls="flush-collapseOne">
                                                {{ $files->name }}&nbsp;
                                                @if ($course->price != 0)
                                                    @if ($files->price == 1)
                                                        <div class="badge btn-success">رایگانــ</div>
                                                    @else
                                                        <div class="badge btn-secondary">نقدیــ</div>
                                                    @endif&nbsp;
                                                @else
                                                @endif
                                                <div dir="ltr" style="position: absolute;left:20;color:darkslategrey">
                                                    <?php
                                                    $sec = $files->time;
                                                    if ($sec > 60) {
                                                        $hour = round($sec / 3600);
                                                        if (strlen($hour) == 1) {
                                                            $hour = '0' . round($sec / 3600);
                                                        }
                                                        $min = round(($sec % 3600) / 60);
                                                        if (strlen($min) == 1) {
                                                            $min = '0' . round(($sec % 3600) / 60);
                                                        }
                                                        $sec = round(($sec % 3600) % 60);
                                                        if (strlen($sec) == 1) {
                                                            $sec = '0' . round(($sec % 3600) % 60);
                                                        }
                                                    } else {
                                                        $hour = '00';
                                                        $min = '00';
                                                    }
                                                    ?>
                                                    {{ $hour . ' : ' . $min . ' : ' . $sec }}

                                                </div>
                                            </button>
                                        </h2>
                                        <div id="flush-collapse{{ $files->id }}" class="accordion-collapse collapse"
                                            aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                            <div class="accordion-body">
                                                {!! $files->description !!} <br>
                                                @if ($course->price == 0 || $files->price == 1 || $status == 1)
                                                    <div>
                                                        @if ($files->type == '3')
                                                            <video id="video" style="width: 100%" controls id="video">
                                                                <source
                                                                    src="{{ asset('uploads/course-file' . $files->file) }}">
                                                                مرورگر شما فایل مورد نظر را پشتیبانی نمیکند. می توانید آن را
                                                                دانلود
                                                                کنید.
                                                            </video>
                                                        @elseif($files->type == '1')
                                                            <img style="width: 100%"
                                                                src="{{ asset('uploads/course-file' . $files->file) }}">
                                                        @elseif($files->type == '2')
                                                            <audio style="width: 100%" controls>
                                                                <source
                                                                    src="{{ asset('uploads/course-file' . $files->file) }}">
                                                                مرورگر شما فایل مورد نظر را پشتیبانی نمیکند. می توانید آن را
                                                                دانلود
                                                                کنید.
                                                            </audio>
                                                        @endif
                                                        <br><br><a class="btn btn-success" target="_blank"
                                                            download="{{ $files->name }}"
                                                            href="{{ asset('uploads/course-file' . $files->file) }}">دانلود
                                                            فایل</a>
                                                    </div>
                                                @else
                                                    <br>
                                                    <hr>
                                                    <div class="text-primary">برای دسترسی به این فایل دوره کافیست دوره را
                                                        تهیه
                                                        کنید.
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        &nbsp;&nbsp;{{ $files->name }}&nbsp;

                                        @if ($course->price != 0)
                                            @if ($files->price == 1)
                                                <div class="badge btn-success">رایگانــ</div>
                                            @else
                                                <div class="badge btn-secondary">نقدیــ</div>
                                            @endif&nbsp;
                                            <span dir="ltr">
                                                <?php
                                                $sec = $files->time;
                                                if ($sec > 60) {
                                                    $hour = round($sec / 3600);
                                                    if (strlen($hour) == 1) {
                                                        $hour = '0' . round($sec / 3600);
                                                    }
                                                    $min = round(($sec % 3600) / 60);
                                                    if (strlen($min) == 1) {
                                                        $min = '0' . round(($sec % 3600) / 60);
                                                    }
                                                    $sec = round(($sec % 3600) % 60);
                                                    if (strlen($sec) == 1) {
                                                        $sec = '0' . round(($sec % 3600) % 60);
                                                    }
                                                } else {
                                                    $hour = '00';
                                                    $min = '00';
                                                }
                                                ?>
                                                {{ $hour . ' : ' . $min . ' : ' . $sec }}

                                            </span>
                                        @else
                                        @endif
                                        <hr>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div style="order:3" class="col col-xl-3 col-lg-3 order-col-course mb-2">
                <div class="col-course col-des-course">
                    <div style="display: flex !important">
                        <div align="right" class="w-50">
                            <p>$ قیمت دوره :</p>
                            <p>مدرس :</p>
                            <p>تعداد دانشجویان :</p>
                            <p>تعداد فایل ها :</p>
                            <p>مدت زمان آموزش:</p>
                            <p>وضیعت دوره :</p>
                            <p>تاریخ شروع :</p>
                            <p>تاریخ بروزرسانی:</p>
                        </div>
                        <div align="left" class="w-50 text-dark">
                            @if ($course->price == 0)
                                <p>رایگانـ</p>
                            @else
                                <p class="fw-bold text-success">{{ number_format($course->price) }} تومان</p>
                            @endif
                            <p>{{ $course->teacher }}</p>
                            <p>{{ $total_student }} نفر</p>
                            <p>{{ count($file) }}&nbsp;فایل </p>
                            <p dir="ltr">

                                <?php
                                $sec = $total_time;
                                if ($sec > 60){
                                    strlen($hour) == 1 ? $hour = '0' . floor($sec / 3600) : $hour = floor($sec / 3600);                     
                                    strlen($min) == 1 ?  $min = '0' . floor(($sec % 3600) / 60) : $min = floor(($sec % 3600) / 60);
                                    strlen($sec) == 1 ?  $sec = '0' .floor(($sec % 3600) % 60) : $sec = floor(($sec % 3600) % 60);
                                } else {
                                    $hour = '00';
                                    $min = '00';
                                }
                                ?>
                                {{ $hour . ' : ' . $min . ' : ' . $sec }}
                            </p>
                            @if ($course->status == 1)
                                <p>به اتمام رسیده</p>
                            @else
                                <p>در حال ضبط</p>
                            @endif
                            <p>{!! jdate($course->created_at)->format('%d %B %Y') !!}</p>
                            <p>{!! jdate($course->updated_at)->format('%d %B %Y') !!}</p>
                        </div>
                    </div>
                    <br>

                    @if (Auth::check())
                        @if ($course->price == 0)
                            <div class="alert alert-warning w-100">این دوره رایگان است.</div>

                        @elseif($status == 1)
                            <div class="alert alert-info w-100">شما عضو این دوره هستید.</div>
                        @else
                            <form action="{{ Route('add.cart', $course->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-success w-100">افزودن به سبد خرید</button>
                            </form>
                        @endif
                    @else
                        <button class="btn btn-light w-100 disabled">ابتدا وارد حساب خود شوید.</button>
                    @endif

                </div>
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
