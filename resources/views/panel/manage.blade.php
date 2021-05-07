@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                            <div class="row">
                                <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                    <h4>مدیران</h4>
                                </div>
                                <div style="text-align: left;padding: 12px 0px 0px 25px"
                                     class="col-xl-6 col-md-12 col-sm-12 col-12">
                                </div>
                            </div>
                            <br>
                            @include('panel.layouts.messagesystem')
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                            <tr>
                                                <th class="text-center">کد</th>
                                                <th>نام</th>
                                                <th>نام کاربری</th>
                                                <th>نوع</th>
                                                <th>تاریخ</th>
                                                <th class="text-center"></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($users AS $user)
                                                <tr>
                                                    <td class="text-center">{{$user->id}}</td>
                                                    <td>{{$user->name}}</td>
                                                    <td>{{$user->username}}</td>
                                                    @if(($user->type)=="gsh229sdiujcl1@kdj#is920")
                                                    <td>ادمین پیشرفته</td>
                                                    @else
                                                    <td>ادمین </td>
                                                    @endif
                                                    <td>{{$user->created_at}}</td>
                                                    <td class="text-center">
                                                        <ul style="list-style-type: none;" class="table-controls">
                                                            <li>
                                                            </li>
                                                            @if(($user->type)!="gsh229sdiujcl1@kdj#is920")
                                                                <li><a href="{{Route('change.password-view-manage', $user->id)}}"
                                                                       data-toggle="tooltip"
                                                                       data-placement="top"
                                                                       title="Edit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24" fill="none"
                                                                             stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round"
                                                                             class="feather feather-edit-2 text-success">
                                                                            <path
                                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                                        </svg>
                                                                    </a></li>
                                                            <li>
                                                                <form action="{{Route('delete.manage' , $user->id)}}"
                                                                      onclick="return confirm('آیا از حذف مطمئن هستید؟')" method="post">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button style="border: none;background-color: white"
                                                                            type="submit">
                                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                                             width="24"
                                                                             height="24"
                                                                             viewBox="0 0 24 24" fill="none"
                                                                             stroke="currentColor"
                                                                             stroke-width="2" stroke-linecap="round"
                                                                             stroke-linejoin="round"
                                                                             class="feather feather-trash-2 icon">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                            <line x1="10" y1="11" x2="10"
                                                                                  y2="17"></line>
                                                                            <line x1="14" y1="11" x2="14"
                                                                                  y2="17"></line>
                                                                        </svg>
                                                                    </button>
                                                                </form>
                                                            </li>
                                                            @else
                                                            @endif
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
        </div>
    </div>
@endsection
