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
                                        data-bs-target="#flush-collapse{{$files->id}}" aria-expanded="false"
                                        aria-controls="flush-collapseOne">
                                    {{$files->name}}
                                </button>
                            </h2>
                            <div id="flush-collapse{{$files->id}}" class="accordion-collapse collapse"
                                 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">{!!$files->description !!} <br>
                                    <div>
                                        <a class="btn btn-success" href="{{asset('uploads/course-file'.$files->file)}}">نمایش
                                            فایل</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div style="margin-right: 10px" class="col col-xl-3 col-course">
                <div class="row">
                    <div align="right" class="col-xl-6 col-6">
                        <p>قیمت دوره :</p>
                        <p>مدرس :</p>
                        <p>تعداد دانشجویان :</p>
                        <p>تعداد فایل ها :</p>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
