@props(['name' => 'Chess Tournament', 'game' => 'Chess', 'date' => '2025.03.22 13:00','country' => 'Hungary', 'address'
=> 'Példa u 22'])

<article class="card" style="width: 18rem;">
    <div class="card-header px-2">
        <h5 class="mb-1">{{$name}}</h5>
    </div>
    <div class="card-body px-2 py-1">
        <ul class="list-group list-group-flush">
            <li class="list-group-item px-0">
                <h6 class="card-subtitle text-body-secondary">{{$game}}</h6>
            </li>
            <li class="list-group-item px-0">
                <h6 class="card-subtitle text-body-secondary">{{$date}}</h6>
            </li>
            <li class="list-group-item px-0">
                <h6 class="card-subtitle text-body-secondary">{{$country}} | {{$address}}</h6>
            </li>
        </ul>
        <div class="d-flex justify-content-between mt-4">
            <div>
                <x-buttons.outlinedBtn variant="secondary" data-bs-toggle="modal" data-bs-target="#editTournamentModal">
                    Edit
                </x-buttons.outlinedBtn>
                <x-buttons.outlinedBtn variant="danger">Delete</x-buttons.outlinedBtn>
            </div>
            <div>
                <a href="/round" class="btn btn-outline-dark">
                    <svg class="mb-1" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-right" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</article>