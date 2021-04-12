@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')

    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>جعبه پیام ها</h4>
                            </div>

                        </div>
                    </div>

                    <div class="widget-content widget-content-area text-center tags-content">
                        <div class="row">
                            <div class="col-xl-3 col-md-2 col-sm-12 col-12">
                            </div>
                            <div class="col-xl-6 col-md-8 col-sm-12 col-12">
                                @include('panel.layouts.messagesystem')
                            </div>
                            <div class="col-xl-3 col-md-2 col-sm-12 col-12">
                            </div>
                        </div>
                        <div class="row">
                            @if(count($message)==0)
                                <div>پیامی موجود نیست.</div>
                            @else
                                <div class="col-lg-8 col-md-8 col-sm-9 filtered-list-search mx-auto">
                                    <form class="form-inline my-2 my-lg-0 justify-content-center">
                                        <div class="w-100">
                                            <input type="text" class="w-100 form-control product-search br-30"
                                                   id="input-search" placeholder="جستجو کنید...">
                                            <button class="btn btn-primary" type="submit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                     class="feather feather-search">
                                                    <circle cx="11" cy="11" r="8"></circle>
                                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                                </svg>
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <div class="col-lg-12">

                                    <div class="searchable-container">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <form action="{{Route('message-delete.all')}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button style="float: left;margin-bottom: 1%" type=submit" class="btn btn-danger">حذف کل</button>
                                            </form>
                                                <div class="searchable-items">
                                                    @foreach($message as $message)
                                                        <a href="{{Route('message.show' , $message->id)}}">
                                                            <div class="items">

                                                                <div class="user-name">
                                                                    <span>{{$message->name}}&nbsp;{{$message->last_name}}</span>
                                                                </div>
                                                                <div class="user-email">
                                                                    <p>از : {{$message->navbar_name}}</p>
                                                                </div>
                                                                <div class="user-status">
                                                                    <span>{!! jdate($message->creates_at) !!}</span>
                                                                </div>
                                                                <div class="action-btn">
                                                                    <form
                                                                        action="{{Route('message.destroy' , $message->id)}}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('delete')
                                                                        <button
                                                                            style="border: none;background-color: white"
                                                                            type="submit">
                                                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                                                 width="24"
                                                                                 height="24"
                                                                                 viewBox="0 0 24 24" fill="none"
                                                                                 stroke="currentColor"
                                                                                 stroke-width="2" stroke-linecap="round"
                                                                                 stroke-linejoin="round"
                                                                                 class="feather feather-trash-2 icon">
                                                                                <polyline
                                                                                    points="3 6 5 6 21 6"></polyline>
                                                                                <path
                                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                                <line x1="10" y1="11" x2="10"
                                                                                      y2="17"></line>
                                                                                <line x1="14" y1="11" x2="14"
                                                                                      y2="17"></line>
                                                                            </svg>
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>



@endsection
