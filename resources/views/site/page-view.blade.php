@extends('site.layouts.master')
@section('content')
    <meta charset=utf-8/>
    <meta name=description content="{{$setting[0]->description}}">
    <meta name=keywords content=", {{$setting[0]->keyword}}">
    <title> {{$page->title}} | {{$setting[0]->name}}</title>
@include('site.layouts.header')
    <div style="text-align:justify;max-width: 100%" class="container">
        <br><br>
            <h5>{{$page -> title}}</h5>
        <br><br>
        @include('panel.layouts.messagesystem')
        <div style="word-wrap: break-word;">
            {!!$page -> text!!}
        </div>
        @if(($page -> form) == "true")

        <br><br><br><h5>فرم ارسال پیام</h5>
        <div class="dropdown-divider"></div>
            <form  action="{{Route('message.store')}}" method="post" >
                @csrf

                <input type="hidden" name="navbar_name" value="{{$page->title}}"/>
                    <div class="col col-xl-5">
                        <label>نام</label>
                        <input type="text" class="form-control" name="name"  />
                    </div>

                    <div class="col col-xl-5">
                        <label>نام خانوادگی</label>
                        <input type="text" class="form-control" name="last_name"  />
                    </div>
                    <div class="col col-xl-5">
                        <label>شماره همراه</label>
                        <input type="text" class="form-control" name="phone"   />
                    </div>
                     <div class="col col-xl-5">
                        <label>متن پیام</label>
                        <textarea name="text" style="height: 150px" class="form-control"></textarea>
                     </div><br>
                        <input style="font-family: 'myfont';" class="btn btn-success" type="submit" value="ارسال پیام" />
            </form>
        @else

        @endif
    </div>


@endsection
