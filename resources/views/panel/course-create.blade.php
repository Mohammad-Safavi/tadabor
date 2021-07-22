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
                        <form action="{{ Route('course.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="type" value="course"> 
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" onload="convertToSlug(this.value)"
                                    onkeyup="convertToSlug(this.value)" name="title" value="{{ old('title') }}"
                                    id="exampleFormControlInput2">
                            </div>
                            <div class="row">
                                @if ($case == 'course')
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">قیمت دوره (ریال)</label>
                                    <input type="text" class="form-control" value="{{ old('price')}}" placeholder="در صورت رایگان بودن دوره عدد صفر را به عنوان قیمت وارد کنید."  name="price" 
                                           id="exampleFormControlInput2">
                                </div>
                                    <div class="form-group mb-4 col col-xl-6 col-12">
                                        <label for="exampleFormControlInput2">وضعیت دوره</label>
                                        <select name="status" class="form-select">
                                            <option value="0">در حال ضبط</option>
                                            <option value="1">به اتمام رسیده</option>
                                        </select>
                                    </div>
                                @else
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">قیمت دوره (ریال)</label>
                                    <input type="text" class="form-control" value="{{ old('price')}}" placeholder="در صورت رایگان بودن دوره عدد صفر را به عنوان قیمت وارد کنید."  name="price" 
                                           id="exampleFormControlInput2">
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">خروجی سئو</label>
                                    <input type="text" class="form-control" id="slug" name="slug"
                                        value="{{ old('slug') }}" id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">کلمات کلیدی</label>
                                    <input type="text" class="form-control" name="keyword"
                                        placeholder="کلمه اول , کلمه دوم , کلمه سوم , ...." value="{{ old('slug') }}"
                                        id="exampleFormControlInput2">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label>دسته بندی</label>
                                    <select name="category" class="form-control">
                                        @foreach ($category as $category)
                                            <option value="{{ $category->title }}">{{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label>نام مدرس</label>
                                    <input type="text" class="form-control" name="teacher" value="{{ old('teacher') }}">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">توضیحات دوره</label>
                                <textarea name="description"></textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عکس شاخص</label>
                                <input type="file" class="form-control-file" name="name_pic">
                            </div>
                            <div class="form-group mb-4">
                                برای بارگذاری فایل های دوره پس از ثبت دوره به صفحه دوره ها بروید و بر روی گزینه <svg
                                    xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-folder">
                                    <path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z">
                                    </path>
                                </svg> کلیک کنید.
                            </div>
                            {{-- <div class="form-group mb-4"> --}}
                            {{-- <label> --}}
                            {{-- نمایش فرم ارسال پیام<input type="checkbox" class="form-check" value="true" name="form"> --}}
                            {{-- </label> --}}
                            {{-- </div> --}}
                            <input type="submit" value="ایجاد" name="time" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function convertToSlug(str) {

            //replace all special characters | symbols with a space
            str = str.replace(/[`~!@#$%^&*()_\-+=\[\]{};:'"\\|\/,.<>?\s]/g, ' ').toLowerCase();

            // trim spaces at start and end of string
            str = str.replace(/^\s+|\s+$/gm, '');

            // replace space with dash/hyphen
            str = str.replace(/\s+/g, '-');
            document.getElementById("slug").value = str;
            //return str;
        }

    </script>
@endsection
