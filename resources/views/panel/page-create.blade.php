@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                                <h4>ایجاد صفحه جدید</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('page.store')}}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">عنوان</label>
                                <input type="text" class="form-control" name="title" value="{{old('title')}}"
                                       id="exampleFormControlInput2">
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">متن</label>
                                <textarea  name="text"></textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label>
                                    نمایش فرم ارسال پیام<input type="checkbox" class="form-check" value="true" name="form">
                                </label>
                            </div>
                            <input type="submit" value="ایجاد" name="time" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

