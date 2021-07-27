@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    @include('panel.layouts.messagesystem')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col2">
                    تغییر رمز عبور
                    <hr>
                    <br>
                    <form method="POST" action="{{ route('change.password_D') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمزعبور فعلی</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="current_password"
                                       autocomplete="current-password">
                            </div>
                        </div>
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
                            <div class="col-md-8 offset-md-4 mt-5">
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
    @include('site.layouts.footer')
@endsection
