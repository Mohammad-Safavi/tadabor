@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col2">
                    اطلاعات کاربری
                    <hr>
                    <p>نام : {{Auth::User()->name}}</p>
                    <p>نام کاربری : {{Auth::User()->username}}</p>
                    <p>ایمیل : {{Auth::User()->email}}</p>
                    <p>تاریخ ویرایش :{!! jdate(Auth::User()->updated_at)!!}</p>
                    <br>
                    ویرایش اطلاعات
                    <hr>

                    @include('panel.layouts.messagesystem')
                    <form action="{{Route('user.updateD')}}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">نام</label>
                                    <input type="text" class="form-control" name="name" value="{{Auth::User()->name}}"
                                           id="exampleFormControlInput2">
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">نام کاربری</label>
                                    <input type="text" class="form-control" name="username"
                                           value="{{Auth::User()->username}}"
                                           id="exampleFormControlInput2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">ایمیل</label>
                            <input type="text" class="form-control" name="email" value="{{Auth::User()->email}}"
                                   id="exampleFormControlInput2">
                        </div>
                        <input type="submit" value="ثبت" name="time" class="mt-2 mb-3 btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>


    @include('site.layouts.footer')
@endsection
