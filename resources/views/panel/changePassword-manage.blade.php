@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="container">
            <div class="col-lg-12 col-12 layout-spacing layout-top-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row layout-top-spacing">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>تغییر رمز عبور</h4>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">
                        @include('panel.layouts.messagesystem')
                        <form method="POST" action="{{Route('change.password-manage' , $user->id)}}">
                            @csrf
                            <br>
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">رمز جدید</label>

                                <div class="col-md-6">
                                    <input id="new_password" type="password" class="form-control" name="new_password"
                                           autocomplete="current-password">
                                </div>
                            </div>
                            <br>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">تکرار رمز
                                    جدید</label>

                                <div class="col-md-6">
                                    <input id="new_confirm_password" type="password" class="form-control"
                                           name="new_confirm_password" autocomplete="current-password">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        ثبت
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
