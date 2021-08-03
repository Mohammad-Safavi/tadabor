@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                                <h4>ایجاد صفحه وبلاگ</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <div class="alert alert-icon-left alert-light-primary mb-4" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>کلمات کلیدی باعث می شود که نوشته شما راحت تر جستجو شود.</div>
                        <form action="{{Route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  name="title" value="{{old('title')}}"
                                       id="exampleFormControlInput2">
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
                                <label for="exampleFormControlInput2">دسته بندی</label>
                                <select class="form-select" name="category">
                                    @foreach($category as $category)
                                        <option value="{{$category->title}}">{{$category->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">متن</label>
                                <textarea   name="text">{{old('text')}}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عکس شاخص</label>
                                <input type="file" class="form-control-file" name="name_pic"
                                       id="exampleFormControlInput2">
                            </div>
                            <div class="form-group mb-4">
                                <label>
                                    نمایش فرم ارسال دیدگاه<input type="checkbox" class="form-check" value="true" name="comment">
                                </label>
                            </div>
                            <input  type="submit" value="ارسال" name="time" class="mt-4 mb-4 btn btn-primary">
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

