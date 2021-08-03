@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col2">
                    <div>اطلاعات کاربری<button style="float: left" class="btn btn-primary" data-toggle="modal"
                            data-target="#profilemodal"><svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                viewBox="0 0 24 24" width="24px" fill="white">
                                <path d="M0 0h24v24H0V0z" fill="none" />
                                <path
                                    d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM5.92 19H5v-.92l9.06-9.06.92.92L5.92 19zM20.71 5.63l-2.34-2.34c-.2-.2-.45-.29-.71-.29s-.51.1-.7.29l-1.83 1.83 3.75 3.75 1.83-1.83c.39-.39.39-1.02 0-1.41z" />
                            </svg></button>
                    </div>
                    <br><br>
                    <p class="text-secondary">نام : {{ Auth::User()->name }}</p>
                    <p class="text-secondary">نام کاربری : {{ Auth::User()->username }}</p>
                    <p class="text-secondary">ایمیل : {{ Auth::User()->email }}</p>
                    <p class="text-secondary">تاریخ ویرایش :{!! jdate(Auth::User()->updated_at) !!}</p>
                    <br>

                    @include('panel.layouts.messagesystem')

                </div>
            </div>
        </div>
    </div>
    <div class="modal fade " id="profilemodal" tabindex="-1" role="dialog"
        aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ویرایش اطلاعات کاربری</h4>
                    <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg></a>
                </div>
                <div class="modal-body">

                    <form action="{{ Route('user.updateD') }}" method="post">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">نام</label>
                                    <input type="text" class="form-control" name="name" value="{{ Auth::User()->name }}"
                                        id="exampleFormControlInput2">
                                </div>
                            </div>

                            <div class="col-xl-6 col-md-6 col-12">
                                <div class="form-group mb-4">
                                    <label for="exampleFormControlInput2">نام کاربری</label>
                                    <input type="text" class="form-control" name="username"
                                        value="{{ Auth::User()->username }}" id="exampleFormControlInput2">
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">ایمیل</label>
                            <input type="text" class="form-control" name="email" value="{{ Auth::User()->email }}"
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
