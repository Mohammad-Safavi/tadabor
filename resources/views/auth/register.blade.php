@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap ">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">ایجاد حساب کاربری</h1>
                        <p class="">برای ادامه شما نیازمند حساب کاربری هستید.</p>
                        <p class="">حساب کاربری دارید؟ <a href="{{Route('login')}}">ورود به حساب</a></p>

                        @include('panel.layouts.messagesystem')
                        <form align="right" action="{{Route('register')}}" method="post">
                            @csrf
                            <div class="field-wrapper input">
                                <label for="exampleFormControlInput2">نام</label>
                                <input  type="text" class="form-control" name="name" value="{{old('name')}}"
                                       id="exampleFormControlInput2">
                            </div>

                            <div class="field-wrapper input">
                                <label for="exampleFormControlInput2">نام کاربری</label>
                                <input type="text" class="form-control" name="username" value="{{old('username')}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">رمزعبور</label>
                                </div>
                                <input id="password" name="password" type="password" class="form-control" placeholder="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <div id="password-field" class="field-wrapper input mb-2">
                                <div class="d-flex justify-content-between">
                                    <label for="password">تکرار رمز عبور</label>
                                </div>
                                <input id="password" name="password_confirmation" type="password" class="form-control" placeholder="">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" id="toggle-password" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                            </div>
                            <input type="submit" value="ایجاد" name="time" class="mt-4 mb-4 w-100 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('site.layouts.footer')
@endsection
