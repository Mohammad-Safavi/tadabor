@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            @include('panel.layouts.messagesystem')
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ردیف</th>
                                        <th>عنوان</th>
                                        <th>تاریخ ویرایش</th>
                                        <th class="text-center"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($item as $item)
                                        <tr>
                                            <td class="text-center">{{$item->id}}</td>
                                            <td>{{$item->title}}</td>
                                            <td>
                                                {!! jdate($item->updated_at)->format('%A, %d %B %Y') !!}
                                            </td>
                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <li><a href="{{Route('item.edit' , $item->id)}}"  data-toggle="tooltip" data-placement="top" title="ویرایش"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></></a></li>
                                                </ul>
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
        </div>
    </div>
    <!-- END MAIN CONTAINER -->
@endsection

