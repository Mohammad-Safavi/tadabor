@extends('site.layouts.master')
@section('content')
    <meta name=description content="{{$setting[0]->description}}">
    <meta name=keywords content="{{$setting[0]->keyword}}">
    <title>{{$setting[0]->name}}</title>
    </head>
    <body id=body>
@include('site.layouts.header')
    <h1 style="display:none">اندیشکده و پژوهشکده قرآنی تدبر</h1>
    <div class=row>
        <div class="col col-xl-4 col-md-6 col-12 content-right">
            <a style="text-decoration: none" href="{{$item[0]->url}}" target="{{$item[0]->open_page}}">
                <div style="margin-right:210px" class=item-content-right>
                <div class=text-content-right>{{$item[0]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[1]->url}}" target="{{$item[1]->open_page}}">
            <div style="margin-right:170px" class=item-content-right>
                <div class=text-content-right>{{$item[1]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[2]->url}}" target="{{$item[2]->open_page}}">
            <div style="margin-right:130px" class=item-content-right>
                <div class=text-content-right>{{$item[2]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[3]->url}}" target="{{$item[3]->open_page}}">
            <div style="margin-right:90px" class=item-content-right>
                <div class=text-content-right>{{$item[3]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[4]->url}}" target="{{$item[4]->open_page}}">
            <div style="margin-right:60px" class=item-content-right>
                <div class=text-content-right>{{$item[4]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[5]->url}}" target="{{$item[5]->open_page}}">
            <div style="margin-right:90px" class=item-content-right>
                <div class=text-content-right>{{$item[5]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[6]->url}}" target="{{$item[6]->open_page}}">
            <div style="margin-right:130px" class=item-content-right>
                <div class=text-content-right>{{$item[6]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[7]->url}}" target="{{$item[7]->open_page}}">
            <div style="margin-right:170px" class=item-content-right>
                <div class=text-content-right>{{$item[7]->title}}</div>
            </div></a>
            <a style="text-decoration: none" href="{{$item[8]->url}}" target="{{$item[8]->open_page}}">
            <div style="margin-right:210px" class=item-content-right>
                <div class=text-content-right>{{$item[8]->title}}</div>
            </div></a>
        </div>
        <div style="z-index:5" class="col col-xl-4 col-md-6 col-12 content-center"><img id=img-circular
                                                                                        src="icons/circular-logo.png"/>
        </div>
        <div class="col col-xl-4 col-md-12 col-12 content-left">
            <a style="text-decoration: none" href="{{$item[9]->url}}" target="{{$item[9]->open_page}}">
            <div style="margin-right:240px" class=item-content-left>
                <img class=img-content-left src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[9]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[10]->url}}" target="{{$item[10]->open_page}}">
            <div style="margin-right:290px" class=item-content-left>
                <img class=img-content-left src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[10]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[11]->url}}" target="{{$item[11]->open_page}}">
            <div style="margin-right:335px" class=item-content-left>
                <img class=img-content-left src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[11]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[12]->url}}" target="{{$item[12]->open_page}}">
            <div style="margin-right:365px" class=item-content-left>
                <img class=img-content-left src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[12]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[13]->url}}" target="{{$item[13]->open_page}}">
            <div style="margin-right:335px" class=item-content-left>
                <img class=img-content-left src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[13]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[14]->url}}" target="{{$item[14]->open_page}}">
            <div style="margin-right:290px" class=item-content-left><img class=img-content-left
                                                                         src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[14]->title}}</p></div></a>
            <a style="text-decoration: none" href="{{$item[15]->url}}" target="{{$item[15]->open_page}}">
            <div style="margin-right:240px" class=item-content-left><img class=img-content-left
                                                                         src="icons/circular-blue.png">
                <p class=text-content-left>{{$item[15]->title}}</p></div></a>
        </div>
    </div>
    <br>
    <footer>
        <div class=row>
            <div style="text-align:center" class="col col-xl-2 col-md-3 col-2">
                <div><img style="display: none" class=icon-footer-corner src="icons/book-logo.png">
                    <p style="display: none" class=text-footer-corner>جستجو در متن قرآن</p></div>
            </div>
            <div style="text-align:center;justify-content:center;align-items:center" class="col col-xl-8 col-md-6 col-8">
                <img class=icon-footer-center src="icons/footer1-logo.png">
                <img class=icon-footer-center src="icons/footer2-logo.png">
                <img class=icon-footer-center src="icons/footer3-logo.png">
                <img style="margin-left:0px !important;" class=icon-footer-center src="icons/footer4-logo.png">
            </div>
            <div style="text-align:center" class="col col-xl-2 col-md-3 col-2">
                <div><img style="display: none;" class=icon-footer-corner src="icons/book-logo.png">
                    <p style="display: none;" class=text-footer-corner>جستجو در روایات</p></div>
            </div>
        </div>
    </footer>
    <br></div>
@endsection
