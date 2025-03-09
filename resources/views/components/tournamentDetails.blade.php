@props(['name', 'game', 'date', 'country', 'address', 'description'])

<section>
    <h1 class="display-5 mb-3">{{$name}}</h1>
    <p class="text-secondary fw-semibold mb-2">{{$game}} |
        {{$date}}</p>
    <p class="text-secondary fw-semibold">{{$country}} {{$address}}</p>
    <p>{{$description}}</p>
</section>