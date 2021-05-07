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
                                <h4>جدول وبلاگ ها</h4>
                            </div>
                        </div>
                        @if(count($blog) == 0)
                            <div style="margin-top: 5%;text-align: center">وبلاگی وجود ندارد.</div>
                        @else

                            <div class="widget-one">
                                @include('panel.layouts.messagesystem')
                                <div class="table-responsive">
                                    <br>
                                    <h6> تعداد نوشته ها : {{count($blog)}} عدد</h6>
                                    <br>
                                    <table class="table table-bordered">
                                        <thead>

                                        <tr>
                                            <th class="text-center">ردیف</th>
                                            <th>عنوان</th>
                                            <th>دسته بندی</th>
                                            <th>تاریخ ویرایش</th>
                                            <th class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($blog as $blog)
                                            <tr>
                                                <td class="text-center">{{$blog->id}}</td>
                                                <td>{{$blog->title}}</td>
                                                <td>
                                                    {{$blog->category}}
                                                </td>
                                                <td>
                                                    {!! jdate($blog->updated_at)->format('%A, %d %B %Y') !!}
                                                </td>
                                                <td class="text-center">
                                                    <ul class="table-controls">
                                                        <li><a href="{{Route('blog.edit' , $blog->id)}}"
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
                                                            <form action="{{Route('blog.delete' , $blog->id)}}"
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
                                @endif
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END MAIN CONTAINER -->
@endsection

