@props(['variant'])
<button {{$attributes->merge(['class' => 'btn btn-outline-'. $variant])}}>{{$slot}}</button>