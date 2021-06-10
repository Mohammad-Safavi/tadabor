
<script src="{{asset('assets/Back/js/snackbar.min.js')}}"></script>
@if ($errors->any())
                <script>
                    Snackbar.show({
                        text: '  @foreach ($errors->all() as $error){{$error}} <br><br> @endforeach',
                        actionTextColor: '#fff',
                        backgroundColor: '#e7515a',
                        pos: 'bottom-left',
                        showAction: false,
                    });
                </script>
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
