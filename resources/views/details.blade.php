<x-layout>
    <x-slot:title>{{$tournament['name']}}</x-slot:title>

    {{-- main class="container mt-5" --}}

    <x-tournamentDetails :name="$tournament['name']" :game="$tournament['game']" date="{{$tournament['date']}}"
        :country="$tournament['country']" :address="$tournament['address']" :description="$tournament['description']">
    </x-tournamentDetails>

    <section class="mt-5 d-flex gap-4 align-items-center">
        <h3 class="mb-0">Rounds</h3>
        @can('isAdmin')
        <div>
            <x-buttons.outlinedBtn class="px-2 py-1" variant="primary" data-bs-toggle="modal"
                data-bs-target="#createRoundModal">Add Round</x-buttons.outlinedBtn>
        </div>
        @endcan
    </section>

    {{-- accordion --}}
    <div id="accordionCointainer">
        <x-accordion.accordionLayout :tournament="$tournament" />
    </div>
    {{-- accordion end--}}

    {{-- create round modal --}}
    <x-modals.modalLayout id="createRoundModal" modalHeader="Create Round">
        <x-modals.roundModal id="createRound" labelText="Name" btnText="Add" />
    </x-modals.modalLayout>
    {{-- create round modal end --}}

    {{-- edit round modal --}}
    <x-modals.modalLayout id="editRoundModal" modalHeader="Edit Round">
        <x-modals.roundModal id="updateRound" method="PATCH" labelText="New Name" btnText="Change" />
    </x-modals.modalLayout>
    {{-- edit round modal end--}}

    {{-- add competitors modal --}}
    <x-modals.modalLayout id="addCompetitorsModal" modalHeader="Add Competitors" data-bs-backdrop="static">
        <x-modals.addCompetitors :users="$users" />
    </x-modals.modalLayout>
    {{-- add competitors modal end --}}

    {{-- main end --}}
</x-layout>