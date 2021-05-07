<script src="{{asset('assets/Back/js/snackbar.min.js')}}"></script>
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
    <script>
        Snackbar.show({
            text: ' {{session('danger')}}',
            actionTextColor: '#fff',
            backgroundColor: '#e7515a',
            pos: 'bottom-left',
            showAction: false,
        });
    </script>
@endif
@if(session('success'))
<script>
        Snackbar.show({
            text: ' {{session('success')}}',
            actionTextColor: '#fff',
            backgroundColor: '#8dbf42',
            pos: 'bottom-left',
            showAction: false,
        });
</script>
@endif
