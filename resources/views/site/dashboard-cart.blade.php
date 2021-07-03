@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    @include('panel.layouts.messagesystem')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col1">
                    @if (count($cart) != 0)
                        <table style="font-size: 14px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">کد محصول</th>
                                    <th scope="col">عنوان</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cart as $carts)
                                    <tr>
                                        <th scope="row">{{ $carts->course_id }}</th>
                                        <td>{{ $carts->title }}</td>
                                        <td>{{ number_format($carts->price) }}</td>
                                        <td>
                                            <form action="{{ Route('delete.cart', $carts->id_cart) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button style="border: none;background-color: white" type="submit">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-trash-2 icon">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path
                                                            d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                        </path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="row cart-box">
                            <div class='col col-xl-7 col-md-7 col-12 '>
                                <br>
                                <form action="{{ Route('cart.dashboard') }}" method="get">
                                    @csrf
                                    <div class="row w-100">
                                        <div class="col col-xl-6 col-md-8 col-9">
                                            <input class="form-control" type="text" name="discount" placeholder="کد تخفیف">
                                        </div>
                                        <div class="col col-xl-3 col-md-4 col-3">
                                            <button type="submit" class="btn btn-primary">اعمال</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class='col col-xl-5 col-md-5 col-12 card-box-col alert-success'>

                                تخفیف : {{ number_format($discount) }} تومان<br>
                                جمع کل : {{ number_format($total) }} تومان
                                <hr>
                                قیمت نهایی : {{ number_format($total_final) }} تومان
                                <div>
                                    <br><br>
                                    <form action="{{ Route('buy') }}" method="POST">
                                        @csrf
                                        <button class="btn btn-success w-100" type="submit">انتقال به درگاه پرداخت</button>
                                    </form>

                                </div>
                            </div>
                        @else
                            <div class="text-dark">سبد خرید شما خالی است.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    </div>
    @include('site.layouts.footer')
@endsection
