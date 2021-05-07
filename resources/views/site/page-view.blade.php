@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div style="text-align: justify; Word-wrap : break-word;width: 100%" class="container">
        <br><br>
        <h5>{{$page -> title}}</h5>
        <br><br>
        <div style="word-wrap: break-word;">
            {!!$page -> text!!}
        </div>
        @if(($page -> form) == "true")

            <br><br><br><h5>فرم ارسال پیام</h5>
            <hr>
            <form  action="{{Route('message.store')}}" method="post">
                @csrf

                <input type="hidden" name="navbar_name" value="{{$page->title}}"/>
                <div class="col col-xl-5">
                    @include('panel.layouts.messagesystem')
                    <br>
                    <label>نام</label>
                    <input type="text" class="form-control" name="name"/>
                </div>

                <div class="col col-xl-5">
                    <label>نام خانوادگی</label>
                    <input type="text" class="form-control" name="last_name"/>
                </div>
                <div class="col col-xl-5">
                    <label>شماره همراه</label>
                    <input type="text" class="form-control" name="phone"/>
                </div>
                <div class="col col-xl-5">
                    <label>متن پیام</label>
                    <textarea name="text" style="height: 150px" class="form-control"></textarea>
                </div><br>
                {!! NoCaptcha::renderJs() !!}
                {!! NoCaptcha::display() !!}<br>
                <input style="font-family: 'myfont';" class="btn btn-success" type="submit" value="ارسال پیام"/>
            </form>
        @else

        @endif
    </div>
    @include('site.layouts.footer')

@endsection
