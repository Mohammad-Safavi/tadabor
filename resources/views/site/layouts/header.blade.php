<ul id=ul class=ul-nav-hide>
    <li style="text-align:left !important;cursor:pointer;margin-top:8px;margin-left:10px" onclick="menu_close()"><svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18"><path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/></svg></li>
    <br>
    <form style="width:100%;height:50px;padding-top:7px !important;" action="{{Route('blog.search')}}" method=get>
        <input style="width:80% !important;margin-right:auto;margin-left:auto;font-size:14px;" class=form-control
               name="keyword" type=search placeholder="جستجو..."></form>
    <br>
    <li class="btn btn-light w-100 li-hide"><a style="font-size: 14px" href="{{$navbar[0]->url}}"
                                               target="{{$navbar[0]->open_page}}">{{$navbar[0] -> title}}</a></li>
    <li class="btn btn-light w-100 li-hide"><a style="font-size: 14px" href="{{$navbar[1]->url}}"
                                               target="{{$navbar[1]->open_page}}">{{$navbar[1] -> title}}</a></li>
    <li class="btn btn-light w-100 li-hide"><a style="font-size: 14px" href="{{$navbar[2]->url}}"
                                               target="{{$navbar[2]->open_page}}">{{$navbar[2] -> title}}</a></li>
    <li class="btn btn-light w-100 li-hide"><a style="font-size: 14px" href="{{$navbar[3]->url}}"
                                               target="{{$navbar[3]->open_page}}">{{$navbar[3] -> title}}</a></li>
    <br></ul>
<div class=container id=container>
    <header>
        <div class=row>
            <div class="col col-xl-3 col-lg-3 col-md-3"><img id=img-top src="{{asset('icons/logo.png')}}"
                                                             alt="اندیشکده قرآنی تدبر"/>
            </div>
            <div class="col col-xl-9 col-lg-9 col-md-9">
                <nav class=d-flex>
                    <ul class=ul-nav>
                        <li id="li"><a class="first-li" href="{{$navbar[0]->url}}"
                                       target="{{$navbar[0]->open_page}}">{{$navbar[0] -> title}}</a></li>
                        <li id="li"><a href="{{$navbar[1]->url}}"
                                       target="{{$navbar[1]->open_page}}">{{$navbar[1] -> title}}</a></li>
                        <li id="li"><a href="{{$navbar[2]->url}}"
                                       target="{{$navbar[2]->open_page}}">{{$navbar[2] -> title}}</a></li>
                        <li id="li"><a class="end-li" href="{{$navbar[3]->url}}"
                                       target="{{$navbar[3]->open_page}}">{{$navbar[3] -> title}}</a></li>

                    </ul>
                    <div class=form-search>
                        <form action="{{Route('blog.search')}}" method=get>
                            <input class="form-control input-search" name="q" type=search placeholder="جستجو...">
                        </form>
                    </div>
                    <div class=div-icon>
                        <a style="text-decoration: none;" href="{{$icon[0]->url}}"><img class=icon-messenger
                                                                                        src="{{asset('icons/whatsapp.png')}}"></a>
                        <a style="text-decoration: none;" href="{{$icon[1]->url}}"><img class=icon-messenger
                                                                                        src="{{asset('icons/bale.png')}}"></a>
                        <a style="text-decoration: none;" href="{{$icon[2]->url}}"><img class=icon-messenger
                                                                                        src="{{asset('icons/eitaa.png')}}"></a>
                        <a style="text-decoration: none;" href="{{$icon[3]->url}}"><img class=icon-messenger
                                                                                        src="{{asset('icons/aparat.png')}}"></a>
                        <a style="text-decoration: none;" href="{{$icon[4]->url}}"><img class=icon-messenger
                                                                                        src="{{asset('icons/instagram.png')}}"></a>
                    </div>
                    <div class=search-logo>
                        <img class=img-search-logo src="icons/search-logo.png"></div>
                    <div class=menu-logo>
                        <a style="cursor:pointer" onclick="menu_btn()"><img class=img-menu-logo
                                                                            src="{{asset('icons/menu-logo.png')}}"></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

