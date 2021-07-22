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
                                @foreach ($course as $course)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->price }}</td>
                                        <td>{{ $course->category }}</td>
                                        <td>{!! jdate($course->updated_at)->format('%A, %d %B %Y') !!}</td>
                                        <td class="text-center">
                                            <ul class="table-controls">
                                                <li>
                                                    <a href='{{ Route('course.student', $course->id) }}'>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-users">
                                                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                            <circle cx="9" cy="7" r="4"></circle>
                                                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                                        </svg> </a>
                                                </li>
                                                <li>
                                                    <a data-toggle="modal" data-target="#onefilemodal"
                                                        data-id="{{ $course->id }}">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-file">
                                                            <path
                                                                d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z">
                                                            </path>
                                                            <polyline points="13 2 13 9 20 9"></polyline>
                                                        </svg> </a>
                                                </li>
                                                <li><a href="{{ Route('file.edit', $course->id) }}" data-toggle="tooltip"
                                                        data-placement="top" title="Edit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-2 text-success">
                                                            <path
                                                                d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z">
                                                            </path>
                                                        </svg>
                                                    </a></li>
                                                <li>
                                                    <form action="{{ Route('course.delete', $course->id) }}"
                                                        onclick="return confirm('آیا از حذف مطمئن هستید؟')" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button style="border: none;background-color: white" type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round"
                                                                class="feather feather-trash-2 icon">
                                                                <polyline points="3 6 5 6 21 6"></polyline>
                                                                <path
                                                                    d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                </path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
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
    <div class="modal fade bd-example-modal-lg" id="onefilemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">اضافه کردن فایل</h4>
                    <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true"><svg
                            xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                            </path>
                        </svg></a>
                </div>
                <div class="modal-body">

                    <div class="card card-body">
                        <form id="upload">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" id="course_id" name="from_where">
                         <br>
                            <div class="form-group">
                                <label>انتخاب فایل</label>
                                <input type="file" name="file" class="form-control-file">
                            </div><br>
                            <input id="submit" type="submit" value="ثبت" class="mt-4 mb-4 btn btn-primary">
                            <div style="display: none" id="prog">
                                <div style="width: 100%" class="progress">
                                    <div id="status"></div>
                                    <div style="background-color : darkblue" id="bar"></div>
                                </div>
                                <div style="color: rgb(138, 135, 135)" id="percent">0%</div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(e) {

            $('#upload').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    xhr: function() {
                        var xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                            if (evt.lengthComputable) {
                                var percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100) + '%';
                                $('#prog').css('display', 'block');
                                $('#percent').text(percentComplete);
                                $('#bar').width(percentComplete);
                                $('#submit').prop('disabled', true);


                                if (percentComplete === 100) {
                                    $('#status').html('آپلود با موفقیت انجام شد.');
                                    $('#submit').prop('disabled', false);
                                    $('#prog').css('display', 'none');

                                }

                            }
                        }, false);

                        return xhr;
                    },
                    url: "/sin-panel/file-course/store",
                    method: "POST",
                    data: new FormData(this),
                    datatype: 'json',
                    contentType: false,
                    cache: false,
                    processData: false,
                    enctype: "multipart/form-data",
                    success: function(response) {
                        if (response.success) {
                            location.reload();
                            Snackbar.show({
                                text: response.message,
                                actionTextColor: '#fff',
                                backgroundColor: '#8dbf42',
                                pos: 'bottom-left',
                                showAction: false,
                            });
                            location.reload();

                        } else {
                            alert("Error")
                        }
                    },
                    error: function(response) {
                        Snackbar.show({
                            text: response.message,
                            actionTextColor: '#fff',
                            backgroundColor: '#e7515a',
                            pos: 'bottom-left',
                            showAction: false,
                        });
                    },
                });
            });
        });
    </script>

@endsection
