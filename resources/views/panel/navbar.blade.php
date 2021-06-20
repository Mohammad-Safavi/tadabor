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
                                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#mynavbar" data-id="{{$navbar->id }}"
                                                        data-title="{{$navbar->title }}" data-url="{{$navbar->url }}"
                                                        data-open="{{$navbar ->open_page}}">
                                                    ویرایش
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content-area br-4">
                        <div class="widget-one">
                            <h6>آدرس آیکون ها</h6>
                            <br>
                            <div style="overflow-x: hidden !important;" class="table-responsive">
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

                                    @foreach($icon as $icon)
                                        <tr>
                                            <td>{{$icon->id}}</td>
                                            <td>
                                                <p class="mb-0">{{$icon->title}}</p>
                                            </td>
                                            <td> {!! jdate($navbar->updated_at)->format('%A, %d %B %Y') !!}</td>
                                            <td class="text-center">
                                                <form action="{{Route('navbar.update-icon' , $icon->id )}}"
                                                      method="post">
                                                    @csrf
                                                    @method('put')
                                                    <div class="row">
                                                        <div class="col col-xl-10">
                                                            <input name="url" class="form-control"
                                                                   value="{{$icon->url}}"
                                                                   placeholder="آدرس جدید را وارد کنید.">
                                                        </div>
                                                        <div class="col col-xl-2">
                                                            <input type="submit" style="font-size: 12px;"
                                                                   class="btn btn-success"
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
        </div>
    </div>
    <div class="modal fade" id="mynavbar" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">ویرایش</h4>
                    <a href="#" data-dismiss="modal" aria-label="Close" aria-hidden="true"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                            <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
                        </svg></a>
                </div>
                <div class="modal-body">
                    <div class="alert alert-icon-left alert-light-success mb-4" role="alert">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             class="feather feather-alert-triangle">
                            <path
                                d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path>
                            <line x1="12" y1="9" x2="12" y2="13"></line>
                            <line x1="12" y1="17" x2="12" y2="17"></line>
                        </svg>
                        سعی کنید از عنوان های کوتاه استفاده کنید تا چینش نوبار سایت بهم نریزد!
                    </div>
                    <form action="{{Route('navbar.update')}}"
                          method="post"
                          onsubmit="FormSubmit(this);">
                        @csrf
                        @method('put')
                        <input type="hidden" id="nav_id" name="nav_id" value="">
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">عنوان</label>
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                        <label for="exampleFormControlInput2">آدرس صفحه</label>
                        <p>می توانید در فیلد زیر آدرس دلخواه خود را وارد کنید و
                            یا از صفحات و نوشته ها ایجاد
                            شده
                            استفاده کنید.
                        </p>
                        <p>آدرس های اصلی : <br> صفحه اصلی : http://andqt.ir <br>
                            صفحه اصلی وبلاگ ها (نوشته ها) : http://andqt.ir/blog
                        </p>
                        <input class="form-select" list="pageurl" id="url" name="url"
                               value="{{$navbar->url}}">
                        <datalist id="pageurl">
                            @foreach($blog as $blog)
                                <option value="http://andqt.ir/blog/{{$blog->id}}">{{$blog->title}}</option>
                            @endforeach
                            @foreach($page as $page)
                                <option value="http://andqt.ir/page/{{$page->id}}">{{$page->title}}</option>
                            @endforeach
                        </datalist>
                        <br>
                        <div class="form-group mb-4">
                            <label for="exampleFormControlInput2">حالت باز
                                شدن</label>
                            <select class="form-select" id="open_form" name="open_page"
                                    value="{{$navbar ->open_page}}">
                                <option value="_self">در همان صفحه باز شود.
                                </option>
                                <option value="_blank">در صفحه دیگری باز شود.
                                </option>
                            </select>
                        </div>
                        <input type="submit" value="ویرایش"
                               class="mt-4 mb-4 btn btn-primary">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
