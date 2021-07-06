@extends('panel.layouts.master')
@section('content')
    @include('panel.layouts.tinymce')
    @include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing">
                <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-spacing">
                    <div class="row">
                        <div class="col col-xl-7 col-md-12 col-sm-12 col-12">
                            <h5>دانشجویان</h5>
                        </div>
                            
                            </div>
                        </form>
                    </div>
                    @if (count($conn) != 0)
                    
                        @include('panel.layouts.messagesystem')
                        <br>
                        <table style="font-size: 14px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">کد کاربر</th>
                                    <th scope="col">نام</th>
                                    <th scope="col">زمان ثبت نام</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($conn as $student)
                                    <tr>
                                        <th scope="row">{{ $student->id }}</th>
                                        <th scope="row">{{ $student->name }}</th>
                                        <th scope="row">{{jdate($student->create_at)}}<th>
                                    </tr>
                                @endforeach
                               
                            </tbody>
                        </table>
                    @else
                        <div class="text-dark">هنوز دانش جویی ثبت نام نکرده است.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

