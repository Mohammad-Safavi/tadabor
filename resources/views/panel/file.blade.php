@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')
    @include('panel.layouts.messagesystem')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>جدول فایل ها</h4>
                            </div>
                        </div>                        
                        <table class="table">
                            <thead>

                            <tr>
                                <th class="text-center">ردیف</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
                                <th>دسته بندی</th>
                                <th>تاریخ ویرایش</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($course as $course)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$course->title}}</td>
                                    <td>{{$course->price}}</td>
                                    <td>{{$course->category}}</td>
                                    <td>{!! jdate($course->updated_at)->format('%A, %d %B %Y') !!}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li>
                                                <a href='{{Route('course.student' , $course->id)}}'>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>                                                </a>
                                          </li>
                                            <li>
                                                    <a href='{{Route('file.show' , $course->id)}}'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-folder"><path d="M22 19a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h5l2 3h9a2 2 0 0 1 2 2z"></path></svg>
                                                    </a>
                                            </li>
                                            <li><a href="{{Route('course.edit' , $course->id)}}"
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
                                                <form action="{{Route('course.delete' , $course->id)}}"
                                                      onclick="return confirm('آیا از حذف مطمئن هستید؟')"
                                                      method="post">
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
@endsection

