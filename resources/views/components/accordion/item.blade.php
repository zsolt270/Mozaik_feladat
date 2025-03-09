@props(['round', 'tournament', ])

<article class="accordion-item">
    <h2 class="accordion-header">
        <div class="d-flex">
            <button class="accordion-button {{$round == $tournament['rounds'][0]  ? "" : " collapsed" }}" type="button"
                data-bs-toggle="collapse" data-bs-target="#{{$round}}" aria-expanded="true" aria-controls="{{$round}}">
                {{$round}}
            </button>
            <x-buttons.outlinedBtn variant="secondary" data-bs-toggle="modal" data-bs-target="#editRoundModal">
                Edit</x-buttons.outlinedBtn>
            <x-buttons.outlinedBtn variant="danger">Delete</x-buttons.outlinedBtn>
        </div>
    </h2>
    <div id="{{$round}}" class="accordion-collapse collapse {{$round == $tournament['rounds'][0] ? " show" : "" }}"
        data-bs-parent="#roundsAccordion">
        <div class="accordion-body">
            <div class="d-flex gap-4 align-items-center border-bottom border-secondary pb-2">
                <h6 class="mb-0">Participants</h6>
                <x-buttons.outlinedBtn class="px-2 py-0" variant="primary" data-bs-toggle="modal"
                    data-bs-target="#addParticipantModal">Add</x-buttons.outlinedBtn>
            </div>
            <div class="d-flex column-gap-5 row-gap-2 flex-wrap justify-content-between  justify-content-sm-start">
                <x-accordion.participant></x-accordion.participant>
                <x-accordion.participant></x-accordion.participant>
                <x-accordion.participant></x-accordion.participant>
            </div>
        </div>
    </div>
</article>