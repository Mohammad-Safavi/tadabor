@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div style="text-align: justify; Word-wrap : break-word;width: 100%" class="container">
        <br><br>
        <h5>{{$page -> title}}</h5>
        <br><br>
        <div style="://andqt.irword-wrap: break-word;">
            {!!$page -> text!!}
        </div>
        @if(($page -> form) == "true")

            <br><br><br><h5>فرم ارسال پیام</h5>
            <hr>
            <form id="formMessage">
                @csrf

                <input type="hidden" id="navbar_name" value="{{$page->title}}"/>
                <div class="col col-xl-5">
                    @include('panel.layouts.messagesystem')
                    <br>
                    <div class="row">
                        <div class="col col-xl-6 col-md-6 col-12">
                    <label>نام</label>
                    <input type="text" id="name" class="form-control"/>
                        </div>
                        <div class="col col-xl-6 col-md-6 col-12">
                    <label>نام خانوادگی</label>
                    <input type="text" id="last_name" class="form-control" />
                        </div>
                    </div>
                    <label>شماره همراه</label>
                    <input type="text" id="phone" class="form-control"/>
                    <label>متن پیام</label>
                    <textarea id="text" style="height: 150px" class="form-control"></textarea><br>

                <div  class="row captcha">
                <div class="col col-xl-8 col-8">
                    <div class="img-captcha">{!! captcha_img() !!}</div>
                </div>
                <div align="left" class="col col-xl-4 col-4">
                    <svg id="btn-refresh" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z"/></svg>

                </div><br>
                <input id="captcha" type="text" class="form-control" placeholder="کد کپچا را وارد کنید."
                       name="captcha">
                </div>
                <div class="alert-danger valError" id="captchaError"></div>
                </div>
                <br>
                <br>
                <input style="font-family: 'myfont';" class="btn btn-success" type="submit" value="ارسال پیام"/>
            </form>
        @else

        @endif
    </div>
    @include('site.layouts.footer')

@endsection
