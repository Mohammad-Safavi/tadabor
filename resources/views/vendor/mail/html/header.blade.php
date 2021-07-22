<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'تدبر')
<img src="{{asset('assets/Front/image/favicon.png')}}" class="logo" alt="اندیشکده قرآنی تدبر">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
