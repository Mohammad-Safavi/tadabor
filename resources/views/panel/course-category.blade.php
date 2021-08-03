@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-4 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <form action="{{Route('category.store')}}" method="post">
                            @csrf
                            <h4>ایجاد دسته بندی</h4><br>
                            <input type="hidden" name="of" value="course">
                            <div class="form-group mb-4">
                                <label>عنوان</label>
                                <input type="text" class="form-control" name="title">
                            </div>
                            <input type="submit" value="ایجاد" name="time" class="mt-4 mb-4 btn btn-primary">
                        </form>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-8 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>جدول دسته بندی ها</h4>
                            </div>
                        </div>
                        @if(count($category) == 0)
                            <div style="margin-top: 5%;text-align: center">دسته بندی ای وجود ندارد</div>
                        @else
                            <br>
                            @include('panel.layouts.messagesystem')
                            <div class="widget-content widget-content-area">
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">کد</th>
                                            <th>عنوان</th>
                                            <th>تاریخ</th>
                                            <th class="text-center"></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($category as $category)
                                            <tr>
                                                <td class="text-center">{{$category->id}}</td>
                                                <td>{{$category->title}}</td>
                                                <td>{!! jdate($category->created_at)->format('%A, %d %B %Y') !!}</td>
                                                <td class="text-center">
                                                    <ul class="table-controls">

                                                        <li>
                                                            <form action="{{Route('category.destroy' , $category->id)}}"
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
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
