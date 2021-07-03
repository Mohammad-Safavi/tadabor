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
@if(session('transaction_ok'))
        <div class="alert alert-success">
        {{session('transaction_ok')}}<br><hr> برای مشاهده محصولات خریداری شده به <a class="text-primary" href={{Route('course.dashboard')}}>آرشیو من</a> مراجعه کنید.
        </div>
@endif
@if(session('transaction_no'))
        <div class="alert alert-danger">
        {{session('transaction_no')}}
        </div>
@endif
