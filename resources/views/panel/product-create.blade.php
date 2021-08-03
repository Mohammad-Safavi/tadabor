@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <h4>ایجاد محصول</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <div class="alert alert-icon-left alert-light-primary mb-4" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>کلمات کلیدی باعث می شود که نوشته شما راحت تر جستجو شود.</div>
                        <form action="{{Route('blog.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">نام</label>
                                    <input type="text" class="form-control" onload="convertToSlug(this.value)" onkeyup="convertToSlug(this.value)"  name="name" value="{{old('name')}}"
                                           id="exampleFormControlInput2">
                                </div>
                                <div class="form-group mb-4 col col-xl-6 col-12">
                                    <label for="exampleFormControlInput2">خروجی سئو</label>
                                    <input type="text" class="form-control" id="slug"  name="slug" value="{{old('slug')}}"
                                           id="exampleFormControlInput2">
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">توضیحات</label>
                                <textarea   name="description">{{old('description')}}</textarea>
                            </div>
                            <div class="form-group col-xl-4 mb-4">

                                <label for="exampleFormControlInput2">قیمت</label>
                                <input type="text" class="form-control"  name="price" value="{{old('price')}}"
                                       id="exampleFormControlInput2"><br>
                                <small id="passwordHelpInline" class="text-muted">
                                    .واحد مبلغ به ریال می باشد.<br>.قیمت را با عدد و به لاتین وارد کنید.
                                </small>
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">تصویر محصول</label>
                                <input type="file" class="form-control-file" name="name_pic"
                                       id="exampleFormControlInput2">
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

