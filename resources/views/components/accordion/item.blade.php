@props(['round', 'tournament'])

<article class="accordion-item">
    <h2 class="accordion-header">
        <div class="d-flex">
            <button class="accordion-button {{$round->id == $tournament->rounds[0]->id  ? "" : " collapsed" }}"
                type="button" data-bs-toggle="collapse" data-bs-target="#{{$round->id}}" aria-expanded="true"
                aria-controls="{{$round->id}}">
                {{$round->name}}
            </button>
            <x-buttons.outlinedBtn variant="secondary" data-bs-toggle="modal" data-bs-target="#editRoundModal">
                Edit</x-buttons.outlinedBtn>
            <x-buttons.outlinedBtn variant="danger">Delete</x-buttons.outlinedBtn>
        </div>
    </h2>
    <div id="{{$round->id}}" class="accordion-collapse collapse {{$round->id == $tournament->rounds[0]->id ? " show"
        : "" }}" data-bs-parent="#roundsAccordion">
        <div class="accordion-body">
            <div class="d-flex gap-4 align-items-center border-bottom border-secondary pb-2">
                <h6 class="mb-0">Competitors</h6>
                <x-buttons.outlinedBtn class="px-2 py-0" variant="primary" data-bs-toggle="modal"
                    data-bs-target="#addCompetitorsModal">Add</x-buttons.outlinedBtn>
            </div>
            <div class="d-flex column-gap-5 row-gap-2 flex-wrap justify-content-between  justify-content-sm-start">
                @foreach ($round->competitors as $competitor)
                <x-accordion.competitors :userName="$competitor->uname" :userId="$competitor->id"
                    :roundId="$round->id" />
                @endforeach
            </div>
        </div>
    </div>
</article>