@extends('panel.layouts.master')
@section('content')
<div class="error404 text-center">
    <div class="container-fluid ">
        <div class="row">
            <div class="col-md-4 mr-auto mt-5 text-md-left text-center">

            </div>
        </div>
    </div>
    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">404</h1>
            <p class="mini-text">متاسفیم!</p>
            <p class="error-text mb-4 mt-1">صفحه مورد نظر یافت نشد.</p>
            <a href="{{ url()->previous()}}"class="btn btn-primary mt-5 ">بازگشت </a>
        </div>
    </div>
</div>
@endsection
