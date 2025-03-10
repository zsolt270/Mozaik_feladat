<x-layout>
    <x-slot:title>Tournaments</x-slot:title>

    {{-- main class="container mt-5" --}}

    <div class="text-center">
        <x-buttons.roundedBtn data-bs-toggle="modal" data-bs-target="#createTournamentModal">Create Tournament
        </x-buttons.roundedBtn>
    </div>
    <div id="cardsContainer">
        <x-cards.list :tournaments="$tournaments" />
    </div>

    {{-- create tournament modal --}}
    <x-modals.modalLayout id="createTournamentModal" modalHeader="Create Tournament">
        <x-modals.tournamentModal id="createTournament" btnText="Add" />
    </x-modals.modalLayout>
    {{-- create tournament modal end--}}

    {{-- edit tournament modal --}}
    <x-modals.modalLayout id="editTournamentModal" modalHeader="Edit Tournament">
        <x-modals.tournamentModal id="editTournament" method="PATCH" btnText="Change" />
    </x-modals.modalLayout>
    {{-- edit tournament modal end--}}

    {{-- main end --}}

</x-layout>