@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.tinymce')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>جدول دوره ها</h4>
                            </div>
                        </div>
                        {{--                        @if(count($blog) == 0)--}}
                        {{--                            <div style="margin-top: 5%;text-align: center">وبلاگی وجود ندارد.</div>--}}
                        {{--                        @else--}}
                        @include('panel.layouts.messagesystem')
                        <br>
                        {{--                            <h6> تعداد نوشته ها : {{count($blog)}} عدد</h6>--}}
                        <br>
                        <table class="table">
                            <thead>

                            <tr>
                                <th class="text-center">ردیف</th>
                                <th>عنوان</th>
                                <th>قیمت</th>
                                <th>تعداد فایل</th>
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
                                    <td>{{$course->up}}</td>
                                    <td>{{$course->category}}</td>
                                    <td>{!! jdate($course->updated_at)->format('%A, %d %B %Y') !!}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                            <li>
                                                <a href='{{Route('file.show' , $course->id)}}'>
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
{{--    <div class="modal fade bd-example-modal-lg" style="overflow-y : auto !important;" id="filemodal" tabindex="-1" role="dialog"--}}
{{--         aria-labelledby="myModalLabel">--}}
{{--        <div class="modal-dialog modal-lg" role="document">--}}
{{--            <div class="modal-content">--}}
{{--                <div class="modal-header">--}}
{{--                    <h4 class="modal-title" id="myModalLabel">مدیریت فایل ها</h4>--}}
{{--                    <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">--}}
{{--                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>--}}
{{--                        </svg></a>--}}
{{--                </div>--}}
{{--                <div class="modal-body">--}}
{{--                    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">--}}
{{--                        اضافه کردن--}}
{{--                    </a>--}}
{{--                    <div class="collapse" id="collapseExample">--}}
{{--                        <div class="card card-body">--}}
{{--                    <form action="{{Route('upload.course')}}"--}}
{{--                          method="post"--}}
{{--                          onsubmit="FormSubmit(this);" enctype="multipart/form-data">--}}
{{--                        @csrf--}}
{{--                        <input type="hidden" id="course_id" name="from_where">--}}
{{--                        <div class="form-group">--}}
{{--                            <label>عنوان فایل</label>--}}
{{--                            <input type="text" name="name" class="form-control">--}}
{{--                        </div>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>توضیحات</label>--}}
{{--                            <textarea name="description"></textarea>--}}
{{--                        </div><br>--}}
{{--                        <div class="form-group">--}}
{{--                            <label>انتخاب فایل</label>--}}
{{--                            <input type="file" name="file" class="form-control-file">--}}
{{--                        </div>--}}
{{--                        <input type="submit" value="ثبت"--}}
{{--                               class="mt-4 mb-4 btn btn-primary">--}}
{{--                    </form>--}}
{{--                        </div>--}}
{{--                    </div><hr>--}}
{{--                    <table class="table">--}}
{{--                        <thead>--}}

{{--                        <tr>--}}
{{--                            <th class="text-center">ردیف</th>--}}
{{--                            <th>عنوان</th>--}}
{{--                            <th>تاریخ بارگزاری</th>--}}
{{--                        </tr>--}}
{{--                        </thead>--}}
{{--                        <tbody>--}}
{{--                        @foreach($file as $file)--}}
{{--                            <tr>--}}
{{--                                <td class="text-center">{{$loop->iteration}}</td>--}}
{{--                                <td>{{$file->name}}</td>--}}
{{--                                <td>{!! jdate($file->created_at)->format('%A, %d %B %Y') !!}</td>--}}
{{--                                <td class="text-center">--}}
{{--                                    <ul class="table-controls">--}}
{{--                                        <li>--}}
{{--                                            <form action=""--}}
{{--                                                  onclick="return confirm('آیا از حذف مطمئن هستید؟')"--}}
{{--                                                  method="post">--}}
{{--                                                @csrf--}}
{{--                                                @method('delete')--}}
{{--                                                <button style="border: none;background-color: white"--}}
{{--                                                        type="submit">--}}
{{--                                                    <svg xmlns="http://www.w3.org/2000/svg"--}}
{{--                                                         width="24"--}}
{{--                                                         height="24"--}}
{{--                                                         viewBox="0 0 24 24" fill="none"--}}
{{--                                                         stroke="currentColor"--}}
{{--                                                         stroke-width="2" stroke-linecap="round"--}}
{{--                                                         stroke-linejoin="round"--}}
{{--                                                         class="feather feather-trash-2 icon">--}}
{{--                                                        <polyline points="3 6 5 6 21 6"></polyline>--}}
{{--                                                        <path--}}
{{--                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>--}}
{{--                                                        <line x1="10" y1="11" x2="10"--}}
{{--                                                              y2="17"></line>--}}
{{--                                                        <line x1="14" y1="11" x2="14"--}}
{{--                                                              y2="17"></line>--}}
{{--                                                    </svg>--}}
{{--                                                </button>--}}
{{--                                            </form>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </td>--}}
{{--                            </tr>--}}
{{--                        @endforeach--}}
{{--                        </tbody>--}}
{{--                    </table>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection

