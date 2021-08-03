@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>اطلاعات کاربری</h4>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 15px" class="widget-content widget-content-area ">
                       نام :  <p>{{Auth::User()->name}}</p>
                       نام کاربری :  <p>{{Auth::User()->username}}</p>
                       نوع  :  <p>{{Auth::User()->type}}</p><hr>
                       تاریخ ویرایش  :  <p>{!! jdate(Auth::User()->updated_at)!!}</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>ویرایش اطلاعات</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('user.update' , Auth::User()->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">نام</label>
                                <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}"
                                       id="exampleFormControlInput2">
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">نام کاربری</label>
                                <input type="text" class="form-control" name="username" value="{{Auth::User()->username}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <input type="submit" value="ثبت" name="time" class="mt-2 mb-3 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
