<div class="col col-xl-3 col-md-4 col-12 mt-3">
    <div class="dash-col1">
        <div class="dash-user">
            <h5>{{ Auth::User()->name }}</h5>
        </div>
        <ul class="mt-4 w-100">
            <li class="dash-li"><a class="dash-a {{ Request::is('dashboard') ? 'fw-bold text-dark' : '' }}"
                    href="{{ Route('dashboard') }}"> مشخصات کاربری</a></li>
            <li class="dash-li"><a class="dash-a {{ Request::is('dashboard/password') ? 'fw-bold text-dark' : '' }}"
                    href="{{ Route('password.dashboard') }}">تغییر رمز عبور</a></li>
            <li class="dash-li">
                @if (count($cart) != 0)
                    <span
                        class="position-absolute  translate-middle badge rounded-pill bg-danger">{{ count($cart) }}</span>
                @else
                @endif
                <a class="dash-a {{ Request::is('dashboard/cart') ? 'fw-bold text-dark' : '' }}"
                    href="{{ Route('cart.dashboard') }}">
                    سبد خرید</a>
            </li>
            <li class="dash-li"><a class="dash-a {{ Request::is('dashboard/payment') ? 'fw-bold text-dark' : '' }}"
                    href="{{ Route('payment.dashboard') }}">تراکنش ها</a></li>
            <li class="dash-li"><a class="dash-a {{ Request::is('dashboard/course') ? 'fw-bold text-dark' : '' }}"
                    href="{{ Route('course.dashboard') }}">آرشیو من</a></li>
            <li class="dash-li">
                <form id="formLog" class="mb-1" action="{{ Route('logout') }}" method="post">
                    @csrf
                    <a class="dash-a" onclick="document.getElementById('formLog').submit()" href="#">خروج</a>
                </form>
            </li>
        </ul>
    </div>
</div>
