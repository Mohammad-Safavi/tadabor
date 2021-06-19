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
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12 ">
                                <h4>مدیرت فایل های دوره</h4>
                            </div>
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                               <button style="float: left" class="btn btn-primary" data-toggle="modal"
                                       data-target="#filemodal" data-id ="{{$course->id}}">اضافه کردن فایل</button>
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
                                <th>تاریخ بارگذاری</th>
                                <th class="text-center"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($file as $file)
                                <tr>
                                    <td class="text-center">{{$loop->iteration}}</td>
                                    <td>{{$file->name}}</td>
                                    <td>{!! jdate($file->creatd_at)->format('%A, %d %B %Y') !!}</td>
                                    <td class="text-center">
                                        <ul class="table-controls">
                                                <form action=""
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
        <div class="modal fade bd-example-modal-lg" id="filemodal" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">اضافه کردن فایل</h4>
                        <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                            </svg></a>
                    </div>
                    <div class="modal-body">

                            <div class="card card-body">
                        <form action="{{Route('upload.course')}}"
                              method="post"
                              onsubmit="FormSubmit(this);" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" id="course_id" name="from_where">
                            <div class="form-group">
                                <label>عنوان فایل</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>توضیحات</label>
                                <textarea name="description"></textarea>
                            </div><br>
                            <div class="form-group">
                                <label>انتخاب فایل</label>
                                <input type="file" name="file" class="form-control-file">
                            </div>
                            <input type="submit" value="ثبت"
                                   class="mt-4 mb-4 btn btn-primary">
                        </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

@endsection

