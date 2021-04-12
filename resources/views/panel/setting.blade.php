@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-4 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>اطلاعات سایت</h4>
                            </div>
                        </div>
                    </div>
                    <div style="font-size: 15px" class="widget-content widget-content-area ">
                        نام :  <p>{{$setting[0]->name}}</p>
                        توضیحات :  <p>{{$setting[0]->description}}</p>
                        کلمات کلیدی  :  <p>{{$setting[0]->keyword}}</p><hr>
                        تاریخ ویرایش  :  <p>{!! jdate($setting[0]->updated_at)!!}</p>
                    </div>
                </div>
                <div class="col-xl-8 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="widget-content-area br-4">
                        <div class="row">
                            <div class="col-xl-6 col-md-6 col-sm-6 col-12">
                                <h4>ویرایش اطلاعات</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form action="{{Route('setting.update', $setting[0]->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">نام سایت</label>
                                <input type="text" class="form-control" name="name" value="{{$setting[0]->name}}"
                                       id="exampleFormControlInput2">
                            </div>

                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">توضیحات جستجو</label>
                                <textarea  maxlength="450" class="form-control" style="height: 70px"  name="description">{{$setting[0]->description}}</textarea>
                            </div>
                            <div class="form-group mb-4">
                                <label for="exampleFormControlInput2">کلمات کلیدی</label>
                                <input type="text" class="form-control"   name="keyword" placeholder="کلمه اول , کلمه دوم , کلمه سوم , ...." value="{{$setting[0]->keyword}}"
                                       id="exampleFormControlInput2">
                            </div>
                            <input type="submit" value="ثبت" name="time" class="mt-2 mb-3 btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
