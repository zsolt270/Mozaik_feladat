<x-layout>
    <x-slot:title>{{$tournament['name']}}</x-slot:title>

    {{-- main class="container mt-5" --}}

    <x-tournamentDetails :name="$tournament['name']" :game="$tournament['game']" date="{{$tournament['date']}}"
        :country="$tournament['country']" :address="$tournament['address']" :description="$tournament['description']">
    </x-tournamentDetails>

    <section class="mt-5 d-flex gap-4 align-items-center">
        <h3 class="mb-0">Rounds</h3>
        <div>
            <x-buttons.outlinedBtn class="px-2 py-1" variant="primary" data-bs-toggle="modal"
                data-bs-target="#createRoundModal">Add Round</x-buttons.outlinedBtn>
        </div>
    </section>

    {{-- accordion --}}
    <section class="accordion mt-3" id="roundsAccordion">
        @foreach ($tournament['rounds'] as $round)
        <x-accordion.item :round="$round" :tournament="$tournament"></x-accordion.item>
        @endforeach
    </section>
    {{-- accordion end--}}

    {{-- create round modal --}}
    <x-modals.modalLayout id="createRoundModal" modalHeader="Create Round">
        <x-modals.roundModal action="" method="" labelText="Name" value="" btnText="Add">
        </x-modals.roundModal>
    </x-modals.modalLayout>
    {{-- create round modal end --}}

    {{-- edit round modal --}}
    <x-modals.modalLayout id="editRoundModal" modalHeader="Edit Round">
        <x-modals.roundModal action="" method="PATCH" labelText="New Name" value="Finals" btnText="Change">
        </x-modals.roundModal>
    </x-modals.modalLayout>
    {{-- edit round modal end--}}

    {{-- add participants modal --}}
    <x-modals.modalLayout id="addParticipantModal" modalHeader="Add Competitors" data-bs-backdrop="static">
        <x-modals.addParticipant :users="$users" />
    </x-modals.modalLayout>
    {{-- add participants modal end --}}

    {{-- main end --}}
</x-layout>