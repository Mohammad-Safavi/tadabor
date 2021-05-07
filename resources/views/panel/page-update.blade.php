@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.tinymce')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <h4>فرم ویرایش</h4>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
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


@endsection
