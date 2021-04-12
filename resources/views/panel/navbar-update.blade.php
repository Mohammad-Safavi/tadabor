@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <h4>ایجاد صفحه وبلاگ</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                    <div class="alert alert-icon-left alert-light-success mb-4" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-alert-triangle">
                            <path
                                d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12" y2="17"></line>
                        </svg>
                        سعی کنید از عنوان های کوتاه استفاده کنید تا چینش نوبار سایت بهم نریزد!
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <form action="{{Route('navbar.update',$navbar->id)}}" method="post"
                          onsubmit="FormSubmit(this);">
                        @csrf
                        @method('put')
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">عنوان</label>
                            <input type="text" name="title" class="form-control"
                                   value="{{$navbar ->title}}">
                        </div>
                        <label for="exampleFormControlInput2">آدرس صفحه</label>
                        <p>می توانید در فیلد زیر آدرس دلخواه خود را وارد کنید و یا از صفحات و نوشته ها ایجاد
                            <شده></شده>
                            استفاده کنید.
                        </p>
                        <p>آدرس های اصلی : <br> صفحه اصلی : http://andqt.ir <br> صفحه اصلی وبلاگ ها (نوشته ها) :
                            http://andqt.ir/blog </p>
                        <input class="form-select" list="pageurl" name="url" value="{{$navbar->url}}">
                        <datalist id="pageurl">
                            @foreach($blog as $blog)
                                <option value="http://andqt.ir/blog/{{$blog->id}}">{{$blog->title}}</option>
                            @endforeach
                            @foreach($page as $page)
                                <option value="http://andqt.ir/page/{{$page->id}}">{{$page->title}}</option>
                            @endforeach
                        </datalist>
                        <br>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">حالت باز شدن</label>
                            <select class="form-select" name="open_page"
                                    value="{{$navbar ->open_page}}">
                                <option value="_self">در همان صفحه باز شود.</option>
                                <option value="_blank">در صفحه دیگری باز شود.</option>
                            </select>
                        </div>
                        <input type="submit" value="ویرایش" class="mt-4 mb-4 btn btn-primary">
                    </form>
                </div>
            </div>
        </div></div>

@endsection


