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
                            <h5>تراکنش ها</h5><br>
                            <form action="{{Route('transaction.delete')}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">حذف کل</button>
                            </form>   
                        </div>
                        
                        <form class="col col-xl-5 col-12 mt-1" action="{{Route('transaction.index')}}" method="get">
                            <div class="row">
                                <div class="col col-xl-6">
                                    <input type="search" class="form-control "
                                           placeholder="جستجو..." name="qt">
                                          
                                </div>
                                <div style="margin-right: -20px;" class="col col-xl-3">
                                    <button style="height: 44px" class="btn btn-outline-success" type="submit">
                                        جستجو
                                    </button>
                                </div>
                                <div class="col col-xl-3">
                                     جستجو بر اساس:<select class="form-select" name="qtc">
                                        <option value="transaction_id">کد پیگیری</option>
                                        <option value="user_id">کد کاربر</option>
                                        </select>
                                       <br>
                                       
                                </div>
                                
                            
                            </div>
                        </form>
                    </div>
                    @if (count($transaction) != 0)
                    
                        @include('panel.layouts.messagesystem')
                        <br>
                        <table style="font-size: 14px" class="table">
                            <thead>
                                <tr>
                                    <th scope="col">کد کاربر</th>
                                    <th scope="col">کد پیگیری</th>
                                    <th scope="col">قیمت</th>
                                    <th scope="col">وضعیت</th>
                                    <th scope="col">زمان تراکنش</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaction as $transactions)
                                    <tr>
                                        <th scope="row">{{ $transactions->user_id }}</th>
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
                        <div class="text-dark">تراکنشی موجود نیست.</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

