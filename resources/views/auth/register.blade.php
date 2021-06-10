@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="form-container outer">
        <div class="form-form">
            <div class="form-form-wrap ">
                <div class="form-container ">
                    <div class="form-content ">

                        <h1 class="">ایجاد حساب کاربری</h1>
                        <p class="">برای ادامه شما نیازمند حساب کاربری هستید.</p>

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
                            <div class="row captcha">
                                <div class="col col-xl-8 col-8">
                                    <div class="img-captcha">{!! captcha_img() !!}</div>
                                </div>
                                <div align="left" class="col col-xl-4 col-4">
                                    <svg id="btn-refresh" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path
                                            d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z"/>
                                    </svg>

                                </div>
                                <br>
                                <input id="captcha" type="text" class="form-control"
                                       placeholder="کد کپچا را وارد کنید."
                                       name="captcha">
                            </div>
                            <input type="submit" value="ایجاد" name="time" class="mt-4 mb-4 w-100 btn btn-primary">
                        </form>
                    <p class="">حساب کاربری دارید؟ <a style="color: #0a53be" href="{{Route('login')}}">ورود به حساب</a></p>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('site.layouts.footer')
    <script src="{{asset('assets/Front/js/form-2.js')}}"></script>

@endsection

