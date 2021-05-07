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
            <div class="row w-100">
                @if(($blog -> comment) == "true")

                    <br>
                    <div class="col col-xl-5 col-md-5 col-12">
                        <h5>فرم ارسال دیدگاه</h5>
                        <br>
                        <form id="formComment">
                            <div class="col col-xl-12">
                                @include('panel.layouts.messagesystem')
                                <label>نام</label>
                                <input type="text"  class="form-control" id="name"/>
                            </div>
                            <div class="col col-xl-12">
                                <label>نام خانوادگی</label>
                                <input type="text"  class="form-control" id="last_name"/>
                            </div>
                            <div class="col col-xl-12">
                                <label>دیدگاه</label>
                                <textarea id="comment"  style="height: 150px" class="form-control"></textarea>

                            </div>
                            <br>
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}<br>
                            <button type="submit" class="btn btn-primary">ارسال</button>
                        </form>
                    </div>
                @else
                @endif
                <br>
                <div class="col col-xl-6 col-md-6 col-12 mt-5">
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

                        @else
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $('#formComment').on('submit' , function(event){
            event.preventDefault();
                var name = $("#name").val();
                var last_name = $("#last_name").val();
                var comment = $("#comment").val();
                $.ajax({
                    url: "{{Route('comment.store')}}",
                    type: 'POST',
                    data: {
                        _token : "{{ csrf_token()}}",
                        name: name,
                        last_name: last_name,
                        comment: comment,
                    },
                    success: function (response) {
                        if (response.success) {
                            Snackbar.show({
                                text: response.message,
                                actionTextColor: '#fff',
                                backgroundColor: '#8dbf42',
                                pos: 'bottom-left',
                                showAction: false,
                            });
                            $(".form-control").val("");
                        } else {
                            alert("Error")
                        }
                    },
                });
            });

    </script>
{{--    <script>--}}
{{--        function formMessage(e){--}}
{{--            e.preventDefault();--}}
{{--            console.log('is ok');--}}
{{--            let name = $("#name").val();--}}
{{--            let last_name = $("#last_name").val();--}}
{{--            let comment = $("#comment").val();--}}
{{--            let blog_id = $("#blog_id").val();--}}
{{--            let blog_title = $("#blog_title").val();--}}
{{--            let _token = $("input[name=_token]").val();--}}
{{--            $.ajax({--}}
{{--                url: "{{Route('comment.store')}}",--}}
{{--                type: "POST",--}}
{{--                data: {--}}
{{--                    name: name,--}}
{{--                    last_name: last_name,--}}
{{--                    comment: comment,--}}
{{--                    blog_id: blog_id,--}}
{{--                    blog_title: blog_title,--}}
{{--                    _token: _token,--}}
{{--                },--}}
{{--                success:function (response){--}}
{{--                    if(response){--}}
{{--                        alert("success full")--}}
{{--                    }--}}
{{--                }--}}
{{--            });--}}
{{--        }--}}
{{--    </script>--}}
    @include('site.layouts.footer')

@endsection
