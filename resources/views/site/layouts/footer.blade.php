<footer id="footer">
    <div class="container">
        <div class="row">
            @foreach ($defaultData[2] as $pfo)
            <div class="col col-xl-4 col-md-4 col-12 mt-4 text-light">
                <h5 class="h-footer">{{$pfo->name}}</h5>
                <hr>
                <p class="p-footer">  
                    {!!$pfo->description!!}
                </p>
            </div>
            @endforeach
        </div>
        <div class="end-footer">
            <div class="row div-end-footer">
                <div  class="col col-xl-8 col-md-9 col-12 mt-3 text-light">
                   کلیه حقوق مادی و معنوی متعلق به اندیشکده قرآنی تدبر است.
                </div>
                <div class="col col-xl-4 col-md-3 col-12 mt-3 text-light">
                    <div class=div-icon>
                        <a href="{{$defaultData[1][0]->url}}">
                            <img class="icon-messenger" src="{{asset('assets/Front/image/whatsapp.png')}}">
                        </a>
                        <a href="{{$defaultData[1][1]->url}}">
                            <img class="icon-messenger" src="{{asset('assets/Front/image/bale.png')}}">
                        </a>
                        <a href="{{$defaultData[1][2]->url}}">
                            <img class="icon-messenger" src="{{asset('assets/Front/image/eitaa.png')}}">
                        </a>
                        <a href="{{$defaultData[1][3]->url}}">
                            <img class="icon-messenger" src="{{asset('assets/Front/image/aparat.png')}}">
                        </a>
                        <a href="{{$defaultData[1][4]->url}}">
                            <img class="icon-messenger" src="{{asset('assets/Front/image/instagram.png')}}">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
