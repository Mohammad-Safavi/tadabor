@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <h4>ایجاد دوره جدید</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('course.update', $course->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" value="{{$course->title}}" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" name="title" 
                                       id="exampleFormControlInput2">
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">قیمت دوره (ریال)</label>
                                    <input type="text" class="form-control" value="{{$course->price}}" placeholder="در صورت رایگان بودن دوره عدد صفر را به عنوان قیمت وارد کنید."  name="price" 
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">وضعیت دوره</label>
                                    <select name="status" class="form-select">
                                        <option value="0" @if($course->status == 0) {{'selected'}} @endif>در حال ضبط</option>
                                        <option value="1" @if($course->status == 1) {{'selected'}} @endif>به اتمام رسیده</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">خروجی سئو</label>
                                    <input type="text" class="form-control" value="{{$course->slug}}" id="slug"  name="slug" 
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">کلمات کلیدی</label>
                                    <input type="text" class="form-control" value="{{$course->keyword}}"   name="keyword" placeholder="کلمه اول , کلمه دوم , کلمه سوم , ...."
                                           id="exampleFormControlInput2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                <label>دسته بندی</label>
                                <select name="category" class="form-select">
                                    @foreach($category as $category)
                                        <option value="{{$category->title}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label>نام مدرس</label>
                                    <input type="text" class="form-control" name="teacher" value="{{$course->teacher}}">
                                </div>
                            </div>
                                <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">توضیحات دوره</label>
                                <textarea name="description">{{$course->description}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                            <img src="{{asset('uploads/course-picture'. $course->name_pic)}}" width="200" alt="{{$course -> title}}"><br><br>
                                <label for="exampleFormControlInput2">عکس شاخص جدید</label>
                                <input type="file" class="form-control-file" name="name_pic">
                            </div>
{{--                            <div class="form-group mb-4">--}}
{{--                                <label>--}}
{{--                                    نمایش فرم ارسال پیام<input type="checkbox" class="form-check" value="true" name="form">--}}
{{--                                </label>--}}
{{--                            </div>--}}
                            <input type="submit" value="ارسال" name="time" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>

        function convertToSlug( str ) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm,'');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            document.getElementById("slug").value= str;
            //return str;
        }

    </script>
@endsection

