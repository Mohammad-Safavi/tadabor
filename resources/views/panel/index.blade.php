@extends('panel.layouts.master')
@section('content')
@include('panel.layouts.header')
    <div id="content" class="main-content">
        <div class="layout-px-spacing">
            <div class="row layout-top-spacing"> 
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                    <div class="widget widget-card-four">
                        <div align="center" class="widget-content p-3 ">
                            <div class="text-dark fs-6">درآمد دریافتی شما تا الان : </div><br>
                            <div class="text-primary fs-6">{{number_format($total)}} تومان</div>
                            <br><hr>
                            <div align="right">این درآمد به دست آمده با جمع مبالغ تراکنش های موفق بدست آمده است.<br>اگر تراکنش ها را پاک کنید درآمد تغییر می کند.</div>
                        </div>
                    </div>
                </div>

                </div>
            </div>
        </div>
</div>
<!-- END MAIN CONTAINER -->
@endsection

