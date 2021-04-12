@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.tinymce')

    <div class="container">
        <div style="margin-top: 5%" class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing w-100" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <a href="{{Route('page.index')}}">صفحات</a>      / ویرایش صفحه
                        </nav>
                        <br><br>
                        @include('panel.layouts.messagesystem')
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>ویرایش صفحه</h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">
                                    <form action="{{Route('page.update', $page->id)}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlInput2">عنوان</label>
                                            <input type="text" name="title" class="form-control" value="{{$page->title}}">
                                        </div>
                                        <div class="form-group mb-4">
                                            <label for="exampleFormControlTextarea1">متن</label>
                                            <textarea  name="text">{{$page->text}}</textarea>
                                        </div>
                                        <div class="form-group mb-4">
                                            <label>
                                                نمایش فرم ارسال پیام<input type="checkbox" class="form-check" name="form" value="true" @if(($page->form)=="true"){{"checked"}} @else{{""}} @endif}>
                                            </label>
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
