@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
       <div class="row mt-5">
           <div class="col col-xl-3 col-md-4 col-12">
               <div class="dash-col1">
               <div class="dash-user">
                   <h5>{{Auth::User()->name}}</h5>
               </div>
               <ul class="mt-4 w-100">
                   <li class="dash-li"><a class="dash-a" href="#"> مشخصات کاربری</a></li>
                   <li class="dash-li"><a class="dash-a" href="#">تغییر رمز عبور</a></li>
                   <li class="dash-li"><a class="dash-a" href="#">فایل ها و کتاب ها</a></li>
                   <li class="dash-li"><a class="dash-a" href="#">حمایت از اندیشکده</a></li>
                   <li class="dash-li"><a class="dash-a" href="#">خروج</a></li>
               </ul>
               </div>
           </div>
           <div class="col col-xl-9 col-md-8 col-12">
               <div class="dash-col2">
                سلام
               </div>
           </div>
       </div>
    </div>
    @include('site.layouts.footer')
@endsection
