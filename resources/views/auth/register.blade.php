@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="container">
            <div class="col-lg-12 col-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>ثبت مدیر</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('register')}}" method="post">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">نام</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                       id="exampleFormControlInput2">
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">نام کاربری</label>
                                <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">رمز عبور</label>
                                <input type="password" name="password" autocomplete="new-password" class="form-control" id="exampleFormControlInput2">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">تکرار رمز عبور</label>
                                <input type="password" class="form-control"  name="password_confirmation" id="exampleFormControlInput2">
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlSelect1">نوع دسترسی</label>
                                <select class="form-select" name="type" value="{{old('type')}}"
                                        id="exampleFormControlSelect1">
                                    <option value="admin">دسترسی معمولی</option>
                                    <option value="super_admin">دسترسی پیشرفته</option>
                                </select>
                            </div>
                            <input type="submit" value="ارسال" name="time" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
