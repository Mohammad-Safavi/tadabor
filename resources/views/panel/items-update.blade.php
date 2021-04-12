@extends('panel.layouts.master')
@section('content')
    <div class="container">
        <div style="margin-top: 5%" class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing w-100" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <a href="{{Route('panel')}}">خانه</a>      / ویرایش آیتم
                        </nav>
                        <br><br>
                        @include('panel.layouts.messagesystem')
                        <div class="col-xl-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>فرم ویرایش</h4>
                                        </div>
                                    </div>
                                </div>

                                <div class="widget-content widget-content-area">
                                    <form action="{{Route('item.update',$item->id)}}" method="post" onsubmit="FormSubmit(this);">
                                        @csrf
                                        @method('put')
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">عنوان</label>
                                            <input type="text" name="title" class="form-control"
                                                   value="{{$item ->title}}">
                                        </div>
                                        <label for="exampleFormControlInput2">آدرس صفحه</label>
                                        <p>می توانید در فیلد زیر آدرس دلخواه خود را وارد کنید و یا از صفحات و نوشته ها ایجاد شده
                                            استفاده کنید.</p><p>آدرس های اصلی :  <br> صفحه اصلی : http://andqt.ir <br> صفحه اصلی وبلاگ ها (نوشته ها) : http://andqt.ir/blog </p>
                                        <input class="form-select" list="pageurl" name="url"  value="{{$item->url}}">
                                        <datalist id="pageurl">
                                            @foreach($blog as $blog)
                                                <option value="http://localhost:8000/blog/{{$blog->id}}">{{$blog->title}}</option>
                                            @endforeach
                                            @foreach($page as $page)
                                                <option value="http://localhost:8000/page/{{$page->id}}">{{$page->title}}</option>
                                            @endforeach
                                        </datalist>
                                        <br>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">حالت باز شدن</label>
                                            <select class="form-select" name="open_page" value="{{$item ->open_page}}">
                                                <option value="_self">در همان صفحه باز شود.</option>
                                                <option value="_blank">در صفحه دیگری باز شود.</option>
                                            </select>
                                        </div>
                                        <input type="submit" value="ویرایش" class="mt-4 mb-4 btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
<script>
</script>
