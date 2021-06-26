<div class="header-container fixed-top">
    <header class="header navbar navbar-expand-sm">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-text">
                <a href="{{Route('panel')}}" class="nav-link">اندیشکده</a>
            </li>
            <li class="nav-item toggle-sidebar">
                <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-list">
                        <line x1="8" y1="6" x2="21" y2="6"></line>
                        <line x1="8" y1="12" x2="21" y2="12"></line>
                        <line x1="8" y1="18" x2="21" y2="18"></line>
                        <line x1="3" y1="6" x2="3" y2="6"></line>
                        <line x1="3" y1="12" x2="3" y2="12"></line>
                        <line x1="3" y1="18" x2="3" y2="18"></line>
                    </svg>
                </a>
            </li>
        </ul>

        <ul class="navbar-item flex-row navbar-dropdown ml-auto">

            <li style="position:absolute !important;left: 3px; bottom: 15px;"
                class="nav-item dropdown user-profile-dropdown  order-lg-0 order-1">
                <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-settings">
                        <circle cx="12" cy="12" r="3"></circle>
                        <path
                            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                    </svg>
                </a>
                <div class="dropdown-menu position-absolute animated fadeInUp" aria-labelledby="userProfileDropdown">
                    <div class="user-profile-section">
                        <div class="media mx-auto">
                            <div style="text-align: right !important;" class="media-body">
                                <h5>{{Auth::User()->name}}</h5>
                                <p>{{Auth::User()->username}}</p>
                            </div>
                        </div>
                    </div>
                    <div style="text-align: right !important;" class="dropdown-item">
                        <a href="{{Route('user.index')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-user">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                <circle cx="12" cy="7" r="4"></circle>
                            </svg>
                            <span>اطلاعات کاربری</span>
                        </a>
                    </div>
                    <div style="text-align: right !important;" class="dropdown-item">
                        <a href="{{Route('change.password-view')}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-lock">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                                <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                            </svg>
                            <span>ویرایش رمز عبور</span>
                        </a>
                    </div>
                    <div style="text-align: right !important;" class="dropdown-item">
                        <form name="myform" action="{{Route('logout')}}" method="post">
                            @csrf
                            <a href="javascript: submitform()">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                     stroke-linejoin="round" class="feather feather-log-out">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" y1="12" x2="9" y2="12"></line>
                                </svg>
                                <span>خروج</span>
                            </a>
                        </form>
                    </div>
                    <script type="text/javascript">
                        function submitform() {
                            document.myform.submit();
                        }
                    </script>
                </div>
            </li>
        </ul>
    </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

    <div class="overlay"></div>
    <div class="search-overlay"></div>
    <!--  BEGIN SIDEBAR  -->
    <div style="overflow-y : auto" class="sidebar-wrapper sidebar-theme">

        <nav id="sidebar">
            <div class="profile-info">
                <figure class="user-cover-image"></figure>
                <div class="user-info">
                    <h6 class="">{{Auth::User()->name}}</h6>
                    <p class="">{{Auth::User()->username}}</p>
                </div>
            </div>
            <div class="shadow-bottom"></div>
            <ul class="list-unstyled menu-categories" id="accordionExample">
                <li class="menu">
                    <a href="{{Route('panel')}}"
                       aria-expanded="{{ Request::is('sin-panel') ? 'true' : '' }}{{ Request::is('sin-panel/user') ? 'true' : '' }}{{ Request::is('sin-panel/change-password') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-home">
                                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                                <polyline points="9 22 9 12 15 12 15 22"></polyline>
                            </svg>
                            <span>خانه</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="#submenu3" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/blog-category') ? 'true' : '' }}{{ Request::is('sin-panel/blog/create') ? 'true' : '' }}{{ Request::is('sin-panel/blog') ? 'true' : '' }}{{ Request::is('sin-panel/blog/*/edit') ? 'show' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-layers">
                                <polygon points="12 2 2 7 12 12 22 7 12 2"></polygon>
                                <polyline points="2 17 12 22 22 17"></polyline>
                                <polyline points="2 12 12 17 22 12"></polyline>
                            </svg>
                            <span>نوشته ها</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('sin-panel/blog-category') ? 'show' : '' }}{{ Request::is('sin-panel/blog/create') ? 'show' : '' }}{{ Request::is('sin-panel/blog') ? 'show' : '' }}{{ Request::is('sin-panel/blog/*/edit') ? 'show' : '' }}"
                        id="submenu3" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/blog-category') ? 'active' : '' }}">
                            <a href="{{Route('blog-category.index')}}">دسته بندی </a>
                        </li>
                        <li class="{{ Request::is('sin-panel/blog') ? 'active' : '' }}{{ Request::is('sin-panel/blog/*/edit') ? 'active' : '' }}">
                            <a href="{{Route('blog.index')}}">نوشته ها</a>
                        </li>
                        <li class="{{ Request::is('sin-panel/blog/create') ? 'active' : '' }}">
                            <a href="{{Route('blog.create')}}">نوشته جدید</a>
                        </li>

                    </ul>
                </li>
                <li class="menu">
                    <a href="#submenu2" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/page') ? 'true' : '' }}{{ Request::is('sin-panel/page/create') ? 'true' : '' }}{{ Request::is('sin-panel/page/*/edit') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-file">
                                <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"></path>
                                <polyline points="13 2 13 9 20 9"></polyline>
                            </svg>
                            <span>صفحات</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('sin-panel/page') ? 'show' : '' }}{{ Request::is('sin-panel/page/create') ? 'show' : '' }}{{ Request::is('sin-panel/page/*/edit') ? 'show' : '' }} "
                        id="submenu2" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/page') ? 'active' : '' }}{{ Request::is('sin-panel/page/*/edit') ? 'active' : '' }}">
                            <a href="{{Route('page.index')}}">صفحات</a>
                        </li>
                        <li class="{{ Request::is('sin-panel/page/create') ? 'active' : '' }}">
                            <a href="{{Route('page.create')}}">صفحه جدید</a>
                        </li>

                    </ul>
                </li>
                <li class="menu">
                    <a href="#submenu4" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/course-file/*') ? 'true' : '' }}{{ Request::is('sin-panel/course/*/edit') ? 'true' : '' }}{{ Request::is('sin-panel/course-category') ? 'true' : '' }}{{ Request::is('sin-panel/course') ? 'true' : '' }}{{ Request::is('sin-panel/course/create') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-book-open"><path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"></path><path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"></path></svg>
                            <span>دوره ها</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('sin-panel/course/*/edit') ? 'show' : '' }} {{ Request::is('sin-panel/course-file/*') ? 'show' : '' }}{{ Request::is('sin-panel/course-category') ? 'show' : '' }}{{ Request::is('sin-panel/course') ? 'show' : '' }}{{ Request::is('sin-panel/course/create') ? 'show' : '' }}"
                        id="submenu4" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/course-category') ? 'active' : '' }}">
                            <a href="{{Route('course-category.index')}}">دسته بندی </a>
                        </li>
                        <li class="{{ Request::is('sin-panel/course') ? 'active' : '' }} {{ Request::is('sin-panel/course/*/edit') ? 'active' : '' }} {{ Request::is('sin-panel/course-file/*') ? 'active' : '' }}">
                            <a href="{{Route('course.index')}}">دوره ها</a>
                        </li>
                        <li class="{{ Request::is('sin-panel/course/create') ? 'active' : '' }}">
                            <a href="{{Route('course.create')}}">ایجاد دوره جدید</a>
                        </li>

                    </ul>
                </li>
                <li class="menu">
                    <a href="#submenu4" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/course-file/*') ? 'true' : '' }}{{ Request::is('sin-panel/course/*/edit') ? 'true' : '' }}{{ Request::is('sin-panel/course-category') ? 'true' : '' }}{{ Request::is('sin-panel/course') ? 'true' : '' }}{{ Request::is('sin-panel/course/create') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>                            <span>فایل ها</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('sin-panel/course/*/edit') ? 'show' : '' }} {{ Request::is('sin-panel/course-file/*') ? 'show' : '' }}{{ Request::is('sin-panel/course-category') ? 'show' : '' }}{{ Request::is('sin-panel/course') ? 'show' : '' }}{{ Request::is('sin-panel/course/create') ? 'show' : '' }}"
                        id="submenu4" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/course-category') ? 'active' : '' }}">
                            <a href="{{Route('course-category.index')}}">دسته بندی </a>
                        </li>
                        <li class="{{ Request::is('sin-panel/course') ? 'active' : '' }} {{ Request::is('sin-panel/course/*/edit') ? 'active' : '' }} {{ Request::is('sin-panel/course-file/*') ? 'active' : '' }}">
                            <a href="{{Route('course.index')}}">فایل ها</a>
                        </li>
                        <li class="{{ Request::is('sin-panel/course/create') ? 'active' : '' }}">
                            <a href="{{Route('course.create')}}">آپلود فایل جدید</a>
                        </li>

                    </ul>
                </li>
                <li class="menu">
                    <a href="#submenu" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/item') ? 'true' : '' }}{{ Request::is('sin-panel/navbar') ? 'true' : '' }}{{ Request::is('sin-panel/navbar/*/edit') ? 'true' : '' }}{{ Request::is('sin-panel/item/*/edit') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-cast">
                                <path
                                    d="M2 16.1A5 5 0 0 1 5.9 20M2 12.05A9 9 0 0 1 9.95 20M2 8V6a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2h-6"></path>
                                <line x1="2" y1="20" x2="2.01" y2="20"></line>
                            </svg>
                            <span>نمایش</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu list-unstyled {{ Request::is('sin-panel/item') ? 'show' : '' }}{{ Request::is('sin-panel/navbar') ? 'show' : '' }}{{ Request::is('sin-panel/navbar/*/edit') ? 'show' : '' }}{{ Request::is('sin-panel/item/*/edit') ? 'show' : '' }}"
                        id="submenu" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/navbar') ? 'active' : '' }}{{ Request::is('sin-panel/navbar/*/edit') ? 'active' : '' }}"
                        ">
                        <a href="{{Route('navbar.index')}}">نوبار</a>
                        </li>
                        <li class="{{ Request::is('sin-panel/item') ? 'active' : '' }}{{ Request::is('sin-panel/item/*/edit') ? 'active' : '' }}">
                            <a href="{{Route('item.index')}}"> فهرست ها</a>
                        </li>

                    </ul>
                </li>


                <li class="menu">
                    <a href="#starter-kit" data-toggle="collapse"
                       aria-expanded="{{ Request::is('sin-panel/manage/admin') ? 'true' : '' }}{{ Request::is('sin-panel/manage/user') ? 'true' : '' }}"
                       class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-terminal">
                                <polyline points="4 17 10 11 4 5"></polyline>
                                <line x1="12" y1="19" x2="20" y2="19"></line>
                            </svg>
                            <span>کاربران</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-chevron-right">
                                <polyline points="9 18 15 12 9 6"></polyline>
                            </svg>
                        </div>
                    </a>
                    <ul class="collapse submenu recent-submenu mini-recent-submenu list-unstyled {{ Request::is('sin-panel/manage/admin') ? 'show' : '' }}{{ Request::is('sin-panel/manage/user') ? 'show' : '' }} "
                        id="starter-kit" data-parent="#accordionExample">
                        <li class="{{ Request::is('sin-panel/manage/user') ? 'active' : '' }}">
                            <a href="{{Route('manage-user')}}">نمایش کاربران</a>
                        </li>
                        @if(Auth::user()->type == "gsh229sdiujcleoxj9801@kdj#is920")
                            <li class="{{ Request::is('sin-panel/manage/admin') ? 'active' : '' }}">
                                <a href="{{Route('manage')}}">نمایش مدیران</a>
                            </li>
                        @endif
                    </ul>
                </li>


                <li class="menu">
                    <a href="{{Route('comment.index')}}"
                       aria-expanded="{{ Request::is('sin-panel/comment') ? 'true' : '' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-feather">
                                <path d="M20.24 12.24a6 6 0 0 0-8.49-8.49L5 10.5V19h8.5z"></path>
                                <line x1="16" y1="8" x2="2" y2="22"></line>
                                <line x1="17.5" y1="15" x2="9" y2="15"></line>
                            </svg>
                            <span>دیدگاه ها</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{Route('message.index')}}"
                       aria-expanded="{{ Request::is('sin-panel/message') ? 'true' : '' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-mail">
                                <path
                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span>پیام ها</span>
                        </div>
                    </a>
                </li>
                <li class="menu">
                    <a href="{{Route('setting.index')}}"
                       aria-expanded="{{ Request::is('sin-panel/setting') ? 'true' : '' }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round" class="feather feather-settings">
                                <circle cx="12" cy="12" r="3"></circle>
                                <path
                                    d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
                            </svg>
                            <span>تنظیمات</span></div>
                    </a>
                </li>
            </ul>
        </nav>
    </div>

