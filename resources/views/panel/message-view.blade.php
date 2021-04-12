@extends('panel.layouts.master')
@section('content')
    <div style="margin-top: 5%" class="container">
        <div class="layout-px-spacing">
            <div class="row layout-spacing layout-top-spacing" id="cancel-row">
                <div class="col-lg-12">
                    <div class="widget-content searchable-container list">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <a href="{{Route('message.index')}}">جعبه پیام</a>      / نمایش پیام
                        </nav>
                        <br><br>
                        <div class="col-lg-12 col-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div style="color: black" class="widget-content widget-content-area">
                                    نام و نام خانوادگی :    {{$message->name}}&nbsp;{{$message->last_name}}
                                </div>
                                <div style="color: black" class="widget-content widget-content-area">
                                    شماره تماس :    {{$message->phone}}
                                </div><hr>
                                <div style="color: black" class="widget-content widget-content-area">
                                   متن پیام :    {{$message->text}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
