@extends('panel.layouts.master')
@section('content')
@include('panel.layouts.header')
<div id="content" class="main-content">
    <div class="layout-px-spacing">
        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                <div class="widget-content-area br-4">
                    <div class="widget-one">
                        <h6>نوار ناوبری</h6>
                        <br>
                        @include('panel.layouts.messagesystem')
                        <div class="table-responsive">
                            <table
                                class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                <thead>
                                <tr>
                                    <th class="">ردیف</th>
                                    <th class="">عنوان</th>
                                    <th class="">تاریخ بروزرسانی</th>
                                    <th class="text-center">ویرایش</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($navbar as $navbar)
                                    <tr>
                                        <td>{{$navbar->id}}</td>
                                        <td>
                                            <p class="mb-0">{{$navbar->title}}</p>
                                        </td>
                                        <td>{!! jdate($navbar->updated_at)->format('%A, %d %B %Y') !!}</td>

                                        <td class="text-center">
                                            <form action="{{Route('navbar.edit',$navbar->id)}}" method="get">
                                                @csrf
                                                <input type="submit" style="font-size: 12px;" class="btn btn-secondary"
                                                       value="ویرایش">
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div  class="widget-content-area br-4">
                    <div class="widget-one">
                        <h6>آدرس آیکون ها</h6>
                        <br>
                        <div style="overflow-x: hidden !important;" class="table-responsive">
                            <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                                <thead>
                                <tr>
                                    <th class="">ردیف</th>
                                    <th class="">عنوان</th>
                                    <th class="">تاریخ بروزرسانی</th>
                                    <th class="text-center">ویرایش</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($icon as $icon)
                                    <tr>
                                        <td>{{$icon->id}}</td>
                                        <td>
                                            <p class="mb-0">{{$icon->title}}</p>
                                        </td>
                                        <td> {!! jdate($navbar->updated_at)->format('%A, %d %B %Y') !!}</td>
                                        <td class="text-center">
                                            <form action="{{Route('navbar.update-icon' , $icon->id )}}" method="post">
                                                @csrf
                                                @method('put')
                                        <div class="row">
                                            <div class="col col-xl-10">
                                                <input name="url" class="form-control" value="{{$icon->url}}" placeholder="آدرس جدید را وارد کنید.">
                                            </div>
                                            <div class="col col-xl-2">
                                                <input type="submit" style="font-size: 12px;" class="btn btn-success"
                                                       value="ویرایش">
                                            </div>
                                        </div>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
    </div>





@endsection
