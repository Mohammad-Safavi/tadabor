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
                        <form action="{{Route('course.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" name="title" value="{{old('title')}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">قیمت دوره</label>
                                    <input type="text" class="form-control"   name="price" value="{{old('price')}}"
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">وضعیت دوره</label>
                                    <select name="status" class="form-select">
                                        <option value="0">در حال ضبط</option>
                                        <option value="1">به اتمام رسیده</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">خروجی سئو</label>
                                    <input type="text" class="form-control" id="slug"  name="slug" value="{{old('slug')}}"
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">کلمات کلیدی</label>
                                    <input type="text" class="form-control"   name="keyword" placeholder="کلمه اول , کلمه دوم , کلمه سوم , ...." value="{{old('slug')}}"
                                           id="exampleFormControlInput2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label>دسته بندی</label>
                                <select name="category" class="form-select">
                                    @foreach($category as $category)
                                        <option value="{{$category->title}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">توضیحات دوره</label>
                                <textarea  name="description"></textarea>
                            </div>
                            <div class="form-group mb-4">
                            برای بارگذاری فایل های دوره پس از ثبت دوره به صفحه دوره ها بروید و بر روی گزینه + کلیک کنید.
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

