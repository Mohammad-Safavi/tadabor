<ul id=ul class=ul-nav-hide>
    <li style="text-align:left !important;cursor:pointer;margin-top:8px;margin-left:10px;" onclick="menu_close()">
        <svg style="background-color: white;border: none;border-radius: 4px" xmlns="http://www.w3.org/2000/svg"
             width="18" height="18" viewBox="0 0 18 18">
            <path
                d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
        </svg>
    </li>
    @foreach($navbar as $navbars)
        <li class="w-100 li-hide">
            <a class="a-li-hide" href="{{$navbars->url}}"
               target="{{$navbars->open_page}}">{{$navbars-> title}}</a>
        </li>
    @endforeach
    <br>
</ul>
<header id="header">
    <div class="container">
        <div class="row">
            <div class="main_header">
                <div class="logo">
                    <img style="width: 100%" src="{{asset('assets/Front/image/logo-w.png')}}">
                </div>
                <div class="search-user ">
                    <div class="menu_search z-index-un">
                        <form class="ms_search" action="{{Route('blog.view')}}" method="get">
                            <div class="ms_search_icon">
                                <svg width="20" height="20" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"
                                     data-svg="search-icon">
                                    <circle fill="none" stroke="#fff" stroke-width="1.1" cx="9" cy="9" r="7"></circle>
                                    <path fill="none" stroke="#fff" stroke-width="1.1"
                                          d="M14,14 L18,18 L14,14 Z"></path>
                                </svg>
                            </div>
                            <input class="ms_search_input" type="search" name="q" placeholder="جستجو ...">
                        </form>
                    </div>
                    <div class="user-header">
                        <div class="user-box">
                            @if(Auth::check())
                                <div class="top-user">
                                    <a class="name-user-header">
                                        @if((count($cart)) !=0)
                                            <span style="right: 95 !important;"
                                                  class="position-absolute top-0 end-100 translate-middle badge rounded-pill bg-danger">{{count($cart)}}</span>
                                        @else
                                        @endif
                                        {{Auth::User()->name}}</a>
                                    <svg style="fill: white" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                         viewBox="0 0 24 24">
                                        <path d="M7 10l5 5 5-5z"/>
                                    </svg>
                                    <div class="dropdown-user">
                                        <a class="user-a" href="{{Route('dashboard')}}"> مشخصات کاربری</a>
                                        <a class="user-a" href="{{Route('password.dashboard')}}">تغییر رمز عبور</a>
                                        <a class="user-a" href="{{Route('cart.dashboard')}}">
                                            @if((count($cart)) !=0)
                                                <span style="right: 65 !important;"
                                                      class="position-absolute translate-middle badge rounded-pill bg-danger">{{count($cart)}}</span>
                                            @else
                                            @endif
                                            سبد خرید</a>
                                            <a class="user-a" href="{{Route('course.dashboard')}}">آرشیو من</a>
                                        <form id="formLog" class="mb-1" action="{{Route('logout')}}" method="post">
                                            @csrf
                                            <a class="user-a" onclick="document.getElementById('formLog').submit()"
                                               href="#">خروج</a>
                                        </form>
                                    </div> &nbsp;
                                </div>

                        </div>
                        @else
                            <a class="name-user-header" href="{{Route('login')}}">ورود / ثبت نام</a>
                            <a class="name-user-header-res" href="{{Route('login')}}"><svg  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><defs><style>.cls-1{fill:none;stroke:#000;stroke-linecap:round;stroke-linejoin:round;stroke-width:2px;}</style></defs><title/><g id="login"><line class="cls-1" x1="29" x2="16" y1="16" y2="16"/><path d="M24,25v3H8V4H24V7h2V3a1,1,0,0,0-1-1H7A1,1,0,0,0,6,3V29a1,1,0,0,0,1,1H25a1,1,0,0,0,1-1V25Z"/><line class="cls-1" x1="16" x2="20" y1="16" y2="12"/><line class="cls-1" x1="16" x2="20" y1="16" y2="20"/><line class="cls-1" x1="25" x2="25" y1="8" y2="6"/><line class="cls-1" x1="25" x2="25" y1="26" y2="24"/></g></svg></a>
                        @endif

                    </div>
                </div>
                <div class=menu-logo>
                    <a style="cursor:pointer" class="img-menu-logo" onclick="menu_btn()">
                        <svg fill="#ffffff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24px"
                             height="24px">
                            <path
                                d="M 0 2 L 0 4 L 24 4 L 24 2 Z M 0 11 L 0 13 L 24 13 L 24 11 Z M 0 20 L 0 22 L 24 22 L 24 20 Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="menu_row">
            <div class="menu">
                <ul style="overflow: auto !important;" class="ul-li">
                    @foreach($navbar as $navbar)
                        <li class="header-li ">
                            <a class="a-li" href="{{$navbar->url}}"
                               target="{{$navbar->open_page}}">{{$navbar-> title}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</header>

