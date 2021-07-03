@extends('site.layouts.master')
@section('content')
    @include('site.layouts.header')
    <div class="container">
        <div class="row mt-3">
            @include('site.layouts.dashboard-header')
            <div class="col col-xl-9 col-md-8 col-11 m-c mt-3">
                <div class="dash-col2">
                    @if (count($transaction) != 0)
                        تراکنش ها
                        <hr>
                        @include('panel.layouts.messagesystem')
                        <br>
                        <table style="font-size: 14px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">کد پیگیری</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">زمان تراکنش</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $transactions)
                                    <tr>
                                        <th scope="row">{{ $transactions->transaction_id }}</th>
                                        <td>{{ number_format($transactions->price) }}</td>
                                        <td>
                                            @if ($transactions->status == 1)
                                                <div class="badge btn-success">موفق</div>
                                            @else
                                                <div class="badge btn-danger">نا موفق</div>
                                            @endif
                                        </td>
                                        <td>{{ jdate($transactions->updated_at) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="text-dark">شما هنوز تراکنشی انجام نداده اید.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    @include('site.layouts.footer')
@endsection
