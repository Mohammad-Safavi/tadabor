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
                                <table class="table">
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
                                                    <li><a href="#" data-toggle="modal"
                                                           data-target="#myitem" data-id="{{$item->id }}"
                                                           data-title="{{$item->title }}" data-url="{{$item->url }}"
                                                           data-open="{{$item ->open_page}}" title="ویرایش"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                                <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                            </svg></a></li>
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
    <div class="modal fade" id="myitem" tabindex="-1" role="dialog"
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
                    <form action="{{Route('item.update')}}"
                          method="post"
                          onsubmit="FormSubmit(this);">
                        @csrf
                        @method('put')
                        <input type="hidden" id="item_id" name="item_id" value="">
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
                               value="">
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
                                    value="">
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
    </div>

@endsection

