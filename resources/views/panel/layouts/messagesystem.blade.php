@if ($errors->any())
    <br>
    <div class="alert alert-danger mb-4" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>
@endif
@if(session('danger'))
    <div class="alert alert-danger mb-4">
        {{session('danger')}}
    </div>
@endif
@if(session('success'))
    <div class="alert alert-success mb-4">
        {{session('success')}}
    </div>
@endif

