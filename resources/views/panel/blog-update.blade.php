@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.tinymce')
        <div class="container ">
            <div class="col-lg-12 col-12 layout-spacing layout-top-spacing">
                <br>
                <nav class="breadcrumb-one" aria-label="breadcrumb">
                    <a href="{{Route('blog.index')}}">وبلاگ ها</a>      / ویرایش وبلاگ
                </nav>
                <br><br>
                @include('panel.layouts.messagesystem')
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>ایجاد صفحه وبلاگ</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('blog.update' , $blog->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" name="title" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)" value="{{$blog->title}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">خروجی سئو</label>
                                    <input type="text" class="form-control" id="slug"  name="slug" value="{{$blog->slug}}"
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">کلمات کلیدی</label>
                                    <input type="text" class="form-control"  name="keyword" placeholder="کلمه اول , کلمه دوم , کلمه سوم , ...." value="{{$blog->keyword}}"
                                           id="exampleFormControlInput2">
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">دسته بندی</label>
                                <select class="form-select" name="category" value="{{$blog->category}}">
                                    @foreach($category as $category)
                                        <option value="{{$category->title}}">{{$category->title}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">متن</label>
                                <textarea  name="text">{{$blog->text}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عکس شاخص</label>
                                <input type="file" class="form-control-file" name="name_pic" value="{{$blog->name_pic}}" id="exampleFormControlInput2">
                            </div>

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

