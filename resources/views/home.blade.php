<x-layout>
    <x-slot:title>Tournaments</x-slot:title>

    {{-- main class="container mt-5" --}}

    <div class="text-center">
        <button class="btn btn-primary shadow px-5 py-2 fw-semibold fs-5 rounded-pill">Create Tournament</button>
    </div>
    <div class="mt-5 d-flex justify-content-center justify-content-md-start gap-5 flex-wrap">
        @foreach ($tournaments as $tournament)
        <x-card name="{{$tournament['name']}}" game="{{$tournament['game']}}" date="{{$tournament['date']}}"
            country="{{$tournament['country']}}" address="{{$tournament['address']}}">
        </x-card>
        @endforeach
    </div>

    {{-- main end --}}

</x-layout>