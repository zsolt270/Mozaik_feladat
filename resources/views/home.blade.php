@php
$tournament = ['name' => 'Valami',
'game' => 'Chess',
'date' => '2017-06-01T08:30',
'country' => 'Hungary',
'address' => 'online',
'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'];

@endphp

<x-layout>
    <x-slot:title>Tournaments</x-slot:title>

    {{-- main class="container mt-5" --}}

    <div class="text-center">
        <x-buttons.roundedBtn data-bs-toggle="modal" data-bs-target="#createTournamentModal">Create Tournament
        </x-buttons.roundedBtn>
    </div>
    <x-cards.list :tournaments="$tournaments" />

    {{-- create tournament modal --}}
    <x-modals.modalLayout id="createTournamentModal" modalHeader="Create Tournament">
        <x-modals.tournamentModal id="createTournament" method="" btnText="Add" />
    </x-modals.modalLayout>
    {{-- create tournament modal end--}}

    {{-- edit tournament modal --}}
    <x-modals.modalLayout id="editTournamentModal" modalHeader="Edit Tournament">
        <x-modals.tournamentModal id="editTournament" method="PATCH" :values="$tournament" btnText="Change" />
    </x-modals.modalLayout>
    {{-- edit tournament modal end--}}

    {{-- main end --}}

</x-layout>