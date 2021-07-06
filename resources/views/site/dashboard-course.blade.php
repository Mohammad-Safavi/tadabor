@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col2">
                    @if (count($conn) != 0)
                        آرشیو من
                        <hr>
                        @include('panel.layouts.messagesystem')
                        <br>
                        <table style="font-size: 14px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ردیف</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">زمان ثبت نام</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($conn as $conn)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{$conn->title}}</td>
                                        <td>{{ jdate($conn->create_at) }}</td>
                                        <td><a class="text-primary" href="{{Route('course.show' , $conn->id)}}">مشاهده دوره</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-dark">شما آرشیوی ندارید.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
