<ul id=ul class=ul-nav-hide>
    <li style="text-align:left !important;cursor:pointer;margin-top:8px;margin-left:10px;" onclick="menu_close()">
        <svg style="background-color: white;border: none;border-radius: 4px" xmlns="http://www.w3.org/2000/svg"
            width="18" height="18" viewBox="0 0 18 18">
            <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z" />
        </svg>
    </li>
    @foreach ($defaultData[0] as $navbars)
        <li class="w-100 li-hide">
            <a class="a-li-hide" href="{{ $navbars->url }}"
                target="{{ $navbars->open_page }}">{{ $navbars->title }}</a>
        </li>
    @endforeach
    <br>
</ul>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="main_header">
                <div class="logo">
                    <img style="width: 100%" src="{{ asset('assets/Front/image/logo-w.png') }}">
                </div>
                <div class="search-user ">
                    <div class="menu_search ">
                        <form class="ms_search" id="formAction" action="{{ Route('course') }}" method="get">
                            <div class="ms_search_icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                    data-svg="search-icon">
                                    <circle fill="none" stroke="#fff" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                                    <path fill="none" stroke="#fff" stroke-width="1.1" d="M14,14 L18,18 L14,14 Z">
                                    </path>
                                </svg>
                            </div>
                            <input class="ms_search_input"  type="search" name="q" placeholder="جستجو ...">
                            <select name="wt" id="selectAction" onchange="setAction()" style="text-align:right !important ;position: absolute;left:0" class="ms_search_input w-25">
                                <option class="text-dark" value="0">دوره ها</option>
                                <option class="text-dark" value="1">فایل ها</option>
                                <option class="text-dark" value="2">وبلاگ</option>
                            </select>
                        </form>
                    </div>
                    <div class="user-header">
                        <div class="user-box">
                            @if (Auth::check())
                                <div class="top-user">
                                    <a class="name-user-header">
                                        @if (count($cart) != 0)
                                            <span style="right: 95 !important;"
                                                class="position-absolute top-0 end-100 translate-middle badge rounded-pill bg-danger">{{ count($cart) }}</span>
                                        @else
                                        @endif
                                        {{ Auth::User()->name }}
                                    </a>
                                    <a class="name-user-header-res">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                            width="24px" fill="white">
                                            <path d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z" />
                                        </svg></a>
                                    <svg style="fill: white" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5z" />
                                    </svg>
                                    <div class="dropdown-user">
                                        <a class="user-a" href="{{ Route('dashboard') }}"><svg
                                                xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24"
                                                height="24px" viewBox="0 0 24 24" width="24px" fill="#000000">
                                                <g>
                                                    <path d="M0,0h24v24H0V0z" fill="none" />
                                                </g>
                                                <g>
                                                    <g>
                                                        <circle cx="10" cy="8" r="4" />
                                                        <path
                                                            d="M10.67,13.02C10.45,13.01,10.23,13,10,13c-2.42,0-4.68,0.67-6.61,1.82C2.51,15.34,2,16.32,2,17.35V20h9.26 C10.47,18.87,10,17.49,10,16C10,14.93,10.25,13.93,10.67,13.02z" />
                                                        <path
                                                            d="M20.75,16c0-0.22-0.03-0.42-0.06-0.63l1.14-1.01l-1-1.73l-1.45,0.49c-0.32-0.27-0.68-0.48-1.08-0.63L18,11h-2l-0.3,1.49 c-0.4,0.15-0.76,0.36-1.08,0.63l-1.45-0.49l-1,1.73l1.14,1.01c-0.03,0.21-0.06,0.41-0.06,0.63s0.03,0.42,0.06,0.63l-1.14,1.01 l1,1.73l1.45-0.49c0.32,0.27,0.68,0.48,1.08,0.63L16,21h2l0.3-1.49c0.4-0.15,0.76-0.36,1.08-0.63l1.45,0.49l1-1.73l-1.14-1.01 C20.72,16.42,20.75,16.22,20.75,16z M17,18c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S18.1,18,17,18z" />
                                                    </g>
                                                </g>
                                            </svg> مشخصات کاربری</a>
                                        <a class="user-a" href="{{ Route('password.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V6c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v2z" />
                                            </svg> تغییر رمز عبور</a>
                                        <a class="user-a" href="{{ Route('cart.dashboard') }}">
                                            @if (count($cart) != 0)
                                                <span style="right: 65 !important;"
                                                    class="position-absolute translate-middle badge rounded-pill bg-danger">{{ count($cart) }}</span>
                                            @else
                                            @endif

                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zM1 2v2h2l3.6 7.59-1.35 2.45c-.16.28-.25.61-.25.96 0 1.1.9 2 2 2h12v-2H7.42c-.14 0-.25-.11-.25-.25l.03-.12.9-1.63h7.45c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.08-.14.12-.31.12-.48 0-.55-.45-1-1-1H5.21l-.94-2H1zm16 16c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z" />
                                            </svg> سبد خرید
                                        </a>
                                        <a class="user-a" href="{{ Route('course.dashboard') }}">
                                            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24"
                                                width="24px" fill="#000000">
                                                <path d="M0 0h24v24H0z" fill="none" />
                                                <path
                                                    d="M20.54 5.23l-1.39-1.68C18.88 3.21 18.47 3 18 3H6c-.47 0-.88.21-1.16.55L3.46 5.23C3.17 5.57 3 6.02 3 6.5V19c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V6.5c0-.48-.17-.93-.46-1.27zM12 17.5L6.5 12H10v-2h4v2h3.5L12 17.5zM5.12 5l.81-1h12l.94 1H5.12z" />
                                            </svg> آرشیو من</a>
                                        <form id="formLog" class="mb-1" action="{{ Route('logout') }}" method="post">
                                            @csrf
                                            <a class="user-a" onclick="document.getElementById('formLog').submit()"
                                                href="#">
                                                <svg xmlns="http://www.w3.org/2000/svg" height="24px"
                                                    viewBox="0 0 24 24" width="24px" fill="#000000">
                                                    <path d="M0 0h24v24H0z" fill="none" />
                                                    <path
                                                        d="M10.09 15.59L11.5 17l5-5-5-5-1.41 1.41L12.67 11H3v2h9.67l-2.58 2.59zM19 3H5c-1.11 0-2 .9-2 2v4h2V5h14v14H5v-4H3v4c0 1.1.89 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
                                                </svg> خروج</a>
                                        </form>
                                    </div> &nbsp;
                                </div>

                            @else
                                <a class="name-user-header" href="{{ Route('login') }}">ورود</a>&nbsp;<span
                                    class="name-user-header">/</span>&nbsp;<a class="name-user-header"
                                    href="{{ Route('register') }}">ثبت نام</a>
                                <a class="name-user-header-res" href="{{ Route('login') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white"
                                        enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px"
                                        fill="#000000">
                                        <g>
                                            <rect fill="none" height="24" width="24" />
                                        </g>
                                        <g>
                                            <path
                                                d="M11,7L9.6,8.4l2.6,2.6H2v2h10.2l-2.6,2.6L11,17l5-5L11,7z M20,19h-8v2h8c1.1,0,2-0.9,2-2V5c0-1.1-0.9-2-2-2h-8v2h8V19z" />
                                        </g>
                                    </svg></a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class=menu-logo>
                    <a style="cursor:pointer" class="img-menu-logo" onclick="menu_btn()">
                        <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"
                            height="24px">
                            <path
                                d="M 0 2 L 0 4 L 24 4 L 24 2 Z M 0 11 L 0 13 L 24 13 L 24 11 Z M 0 20 L 0 22 L 24 22 L 24 20 Z" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="menu_row">
            <div class="menu">
                <ul style="overflow: auto !important;" class="ul-li">
                    @foreach ($defaultData[0] as $navbar)
                        <li class="header-li ">
                            <a class="a-li" href="{{ $navbar->url }}"
                                target="{{ $navbar->open_page }}">{{ $navbar->title }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>
