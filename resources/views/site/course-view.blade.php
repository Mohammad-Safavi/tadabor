@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="row mt-5">
            <div class="col col-xl-8 col-course">
                <div class="div-img-course">
                    <img class="img-course" src="{{asset('uploads/course-picture'. $course->name_pic)}}"
                         alt="{{$course -> title}}">
                </div>
                <br>
                <div class="course-title">
                    <h4>{{$course->title}}</h4>
                </div>
                <hr>
                <div align="justify" class="course-text">
                    {!! $course->description !!}
                </div>
                <hr>
                <div class="accordion accordion-flush bg-light" id="accordionFlushExample">
                    @foreach($file as $files)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="flush-headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapse{{$files->id}}"
                                        @if(!Auth::check()) {{'disabled'}} @endif aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    {{$files->name}}&nbsp;
                                    @if($files->price == 1)
                                    <div class="badge btn-success">رایگان</div>
                                    @else
                                    <div class="badge btn-secondary">نقدی</div>
                                    @endif&nbsp;
                                </button>
                            </h2>
                            <div id="flush-collapse{{$files->id}}" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{!!$files->description !!} <br>
                                    <div>
                                        @if($files->ext == 'mp4' ||$files->ext == 'ogg')
                                            <video style="width: 100%" controls>
                                                <source src="{{asset('uploads/course-file'.$files->file)}}">
                                                مرورگر شما فایل مورد نظر را پشتیبانی نمیکند. می توانید آن را دانلود
                                                کنید.
                                            </video>
                                        @elseif($files->ext == 'png' ||$files->ext == 'jpeg'||$files->ext == 'jpg'||$files->ext == 'gif')
                                            <img style="width: 100%"
                                                 src="{{asset('uploads/course-file'.$files->file)}}">
                                        @elseif($files->ext == 'mp3' ||$files->ext == 'm4a')
                                            <audio style="width: 100%" controls>
                                                <source src="{{asset('uploads/course-file'.$files->file)}}">
                                                مرورگر شما فایل مورد نظر را پشتیبانی نمیکند. می توانید آن را دانلود
                                                کنید.
                                            </audio>
                                        @endif
                                        <br><br><a class="btn btn-success" target="_blank" download="{{$files->name}}"
                                                   href="{{asset('uploads/course-file'.$files->file)}}">دانلود
                                            فایل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="col col-xl-3 col-course col-des-course">
                <div class="row">
                    <div align="right" class="col-xl-6 col-6">
                        <p>قیمت دوره :</p>
                        <p>مدرس :</p>
                        <p>تعداد دانشجویان :</p>
                        <p>تعداد فایل ها :</p>
                        <p>مدت زمان آموزش:</p>
                        <p>وضیعت دوره :</p>
                        <p>تاریخ شروع :</p>
                        <p>تاریخ بروزرسانی:</p>
                    </div>
                    <div align="left" class="col-xl-6 col-6">
                        @if($course->price == 0 )
                            <p>رایگانـ</p>
                        @else
                            <p>{{number_format($course->price)}} ریال</p>
                        @endif
                        <p>{{$course->teacher}}</p>
                        <p>NONE</p>
                        <p>{{count($file)}}&nbsp;فایل </p>
                        <p>NONE </p>
                        @if($course->status == 1 )
                            <p>به اتمام رسیده</p>
                        @else
                            <p>در حال ضبط</p>
                        @endif
                        <p>{!! jdate($course->created_at)->format('%d %B %Y') !!}</p>
                        <p>{!! jdate($course->updated_at)->format('%d %B %Y') !!}</p>
                    </div>
                </div>
                <br>
                @if($status == 1)
                @else
                    @if(Auth::check())
                        <button class="btn btn-success w-100">شرکت در دوره</button>
                    @else
                        <button class="btn btn-light w-100 disabled">ابتدا وارد حساب خود شوید.</button>
                    @endif
                @endif
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
