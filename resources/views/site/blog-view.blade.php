@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="blog_id_holder pt-5">
            <div class="bih__image_box">
                <img src="{{asset('uploads/blog-picture'. $blog->name_pic)}}" alt="{{$blog -> title}}">
            </div>
            <div class="bih__title_box">
                <h6>{{$blog -> title}}</h6>
            </div>
            <div class="bih__category_box">
                <span class="span-box">دسته‌بندی: {{$blog->category}}</span>
                <span class="span-box">تاریخ انتشار: {!!jdate($blog->updated_at)->format('%A، %d %B %Y')!!}</span>
                <span
                    class="span-box">زمان تقریی برای مطالعه: {{$blog->CalculationReadingTime($blog->text)}} دقیقه</span>
            </div>
            <div class="bih_vector_separator">
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
            </div>
            <div class="bih__body_box">
                {!!$blog->text!!}
            </div>
            <div class="bih_vector_end">
                <span></span>
                <img src="{{asset('assets/Front/image/eslimi_a_1.svg')}}">
            </div>
            <div class="w-100">
                @if(($blog -> comment) == "true")

                    <br>
                    <div class="col col-xl-5">
                        <h5>فرم ارسال دیدگاه</h5>
                        <br>
                        <form id="formComment">
                            @csrf
                            <div class="col col-xl-12">
                                <label>نام</label>
                                <input type="text"  class="form-control" id="name"/>
                                <div class="alert-danger valError" id="nameError"></div>
                            </div>
                            <div class="col col-xl-12">
                                <label>نام خانوادگی</label>
                                <input type="text" class="form-control" id="last_name"/>
                                <div class="alert-danger valError"  id="last_nameError"></div>
                            </div>
                            <div class="col col-xl-12">
                                <label>دیدگاه</label>
                                <textarea id="comment" style="height: 150px" class="form-control"></textarea>
                                <div class="alert-danger valError" id="commentError"></div>
                                <input type="hidden" id="blog_id" value="{{$blog->id}}">

                            </div>
                            <br>
                            <div class="row captcha">
                                <div class="col col-xl-8 col-8">
                                    <div class="img-captcha">{!! captcha_img() !!}</div>
                                </div>
                                <div align="left" class="col col-xl-4 col-4">
                                  <svg id="btn-refresh" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M20.944 12.979c-.489 4.509-4.306 8.021-8.944 8.021-2.698 0-5.112-1.194-6.763-3.075l1.245-1.633c1.283 1.645 3.276 2.708 5.518 2.708 3.526 0 6.444-2.624 6.923-6.021h-2.923l4-5.25 4 5.25h-3.056zm-15.864-1.979c.487-3.387 3.4-6 6.92-6 2.237 0 4.228 1.059 5.51 2.698l1.244-1.632c-1.65-1.876-4.061-3.066-6.754-3.066-4.632 0-8.443 3.501-8.941 8h-3.059l4 5.25 4-5.25h-2.92z"/></svg>

                                </div><br>
                                <input id="captcha" type="text" class="form-control" placeholder="کد کپچا را وارد کنید."
                                       name="captcha">
                            </div>
                            <div class="alert-danger valError" id="captchaError"></div>
                            <br>
                            <br>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </form>
                    </div>
                @else
                @endif
                <br>
                <div class="mt-5">
                    @foreach($comment as $comment)
                        @if(($comment->status)=="true" && ($comment->blog_id) == $blog->id)
                            <div class="w-100 comment">
                            <span style="font-weight: bold">
                                {{$comment->name}}&nbsp;{{$comment->last_name}}
                            </span>
                                &nbsp; <span dir="rtl" style="font-size: 10px">
                                    {!! jdate($comment->created_at)->ago() !!}
                                </span>
                                <br><br>
                                <div class="text-comment">
                                    {{$comment->comment}}
                                </div>
                            </div>
                            <hr>
                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @include('site.layouts.footer')

@endsection

