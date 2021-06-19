@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    @include('panel.layouts.messagesystem')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-lg-12">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-header">
                            <div class="row">
                                <div class="col col-xl-8 col-md-12 col-sm-12 col-12">
                                    <h4>دیدگاه ها</h4>
                                </div>
                                <form class="col col-xl-3 col-12 mt-1" action="{{Route('comment.index')}}" method="get">
                                    <div class="row">
                                        <div class="col col-xl-9">
                                            <input type="search" class="form-control "
                                                   placeholder="جستجو..." name="qc">
                                        </div>
                                        <div style="margin-right: -20px;" class="col col-xl-3">
                                            <button style="height: 44px" class="btn btn-outline-success" type="submit">
                                                جستجو
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <br>
                        </div>
                        <div class="widget-content widget-content-area">
                            <div class="table-responsive mb-4">
                                <table id="style-3" class="table style-3 ">
                                    <thead>
                                    <tr>
                                        <th>نام و نام خانوادگی</th>
                                        <th>شماره تماس</th>
                                        <th>تاریخ ارسال</th>
                                        <th>از نوشته</th>
                                        <th class="text-center">وضیعت</th>
                                        <th class="text-center">خواندن</th>
                                        <th class="text-center">عمل</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($comment as $comment)
                                        <tr>
                                            <input type="hidden" id="id_comment" value="{{$comment->id}}">
                                            <input type="hidden" id="status" value="{{$comment->status}}">
                                            <td>{{$comment->name}}</td>
                                            <td id="phone">{{$comment->phone}}</td>
                                            <td id="comment">{!! jdate($comment->created_at) !!}</td>
                                            <td>{!! mb_substr($comment->blog_title  ,0 ,100 ) !!}</td>
                                            <td class="text-center">
{{--                                                <span id="status_dis"></span>--}}
                                                <div id="status_dis"></div>
                                                <script>
                                                    if ($("#status").val() === '') {
                                                        $("#status_dis").html('no')
                                                    } else{
                                                        $("#status_dis").html('ok')
                                                    }
                                                </script>
                                            </td>
                                            <td align="center">
                                                <button class="btn btn-primary" data-toggle="modal"
                                                        data-target="#mycomment" data-comment="{{$comment->comment }}">
                                                    مشاهده
                                                </button>
                                            </td>

                                            <td class="text-center">
                                                @if(($comment->status) == "true")
                                                @else
                                                    <form id="formStatus" style="display: inline-block">
                                                        @csrf
                                                        <input type="hidden" value="true" id="status">
                                                        <button style="background-color: white;border: none"
                                                                type="submit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                 height="24"
                                                                 viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                 stroke-width="2"
                                                                 stroke-linecap="round" stroke-linejoin="round"
                                                                 class="feather feather-check-circle text-primary">
                                                                <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                                                                <polyline points="22 4 12 14.01 9 11.01"></polyline>
                                                            </svg>
                                                        </button>

                                                    </form>
                                                    <script type="text/javascript">
                                                        $('#formStatus').on('submit', function (event) {
                                                            event.preventDefault();
                                                            var status = $("#status").val();
                                                            var id = $("#id_comment").val();
                                                            var _token = $("input[name='_token']").val();
                                                            $.ajax({
                                                                url: "comment/update/" + id,
                                                                type: 'POST',
                                                                data: {
                                                                    _method: 'PUT',
                                                                    status: status,
                                                                    _token: _token,
                                                                },
                                                                success: function (response) {
                                                                    if (response.success) {
                                                                        $.get('comment', function (data) {
                                                                            $('#id').val(data.id);
                                                                            $('#name').val(data.name);
                                                                            $('#phone').val(data.phone);
                                                                            $('#comment').val(data.comment);
                                                                            $('#status').val(data.status);
                                                                        })
                                                                        Snackbar.show({
                                                                            text: response.message,
                                                                            actionTextColor: '#fff',
                                                                            backgroundColor: '#8dbf42',
                                                                            pos: 'bottom-left',
                                                                            showAction: false,
                                                                        });
                                                                    } else {
                                                                        alert("Error")
                                                                    }
                                                                },
                                                            });
                                                        });

                                                    </script>
                                                @endif
                                                <form style="display: inline-block"
                                                      action="{{Route('comment.destroy', $comment->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button style="background-color: white;border: none" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                             viewBox="0 0 24 24"
                                                             fill="none" stroke="currentColor" stroke-width="2"
                                                             stroke-linecap="round"
                                                             stroke-linejoin="round"
                                                             class="feather feather-x-circle text-danger">
                                                            <circle cx="12" cy="12" r="10"></circle>
                                                            <line x1="15" y1="9" x2="9" y2="15"></line>
                                                            <line x1="9" y1="9" x2="15" y2="15"></line>
                                                        </svg>
                                                    </button>

                                                </form>
                                            </td>

                                        </tr>
                                    @endforeach
                                    <input type="text" id="name">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="mycomment" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">متن دیدگاه</h4>
                    <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path
                                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg>
                    </a>
                </div>
                <div class="modal-body">
                    <div>
                        <p class="modal-text"><span id="comment"></span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
