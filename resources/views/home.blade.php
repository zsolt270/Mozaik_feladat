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
        <form class="row g-3" method="POST" action="#">
            @csrf

            <div class="col-md-12">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Chess Tournament">
            </div>
            <div class="col-md-12">
                <label for="game" class="form-label fw-bold">Game</label>
                <input type="text" class="form-control" id="game" name="game" placeholder="Chess">
            </div>
            <div class="col-md-12">
                <label for="date" class="form-label fw-bold">Date</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
            <div class="col-6">
                <label for="country" class="form-label fw-bold">Country</label>
                <input list="countries" class="form-control" id="country" name="country" placeholder="Hungary">
                <x-form.datalist id="countries" />
            </div>
            <div class="col-6">
                <label for="address" class="form-label fw-bold">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Szekszárd Mátyás király u. 12">
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" rows="10" id="description" name="description">
                    </textarea>
            </div>
            <div class="col-12 text-center">
                <x-buttons.roundedBtn type="submit">Create</x-buttons.roundedBtn>
            </div>
        </form>
    </x-modals.modalLayout>
    {{-- create tournament modal end--}}

    {{-- edit tournament modal --}}
    <x-modals.modalLayout id="editTournamentModal" modalHeader="Edit Tournament">
        <form class="row g-3" method="POST" action="#">
            @csrf

            <div class="col-md-12">
                <label for="name" class="form-label fw-bold">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Chess Tournament">
            </div>
            <div class="col-md-12">
                <label for="game" class="form-label fw-bold">Game</label>
                <input type="text" class="form-control" id="game" name="game" placeholder="Chess">
            </div>
            <div class="col-md-12">
                <label for="date" class="form-label fw-bold">Date</label>
                <input type="datetime-local" class="form-control" id="date" name="date">
            </div>
            <div class="col-6">
                <label for="country" class="form-label fw-bold">Country</label>
                <input list="countries" class="form-control" id="country" name="country" placeholder="Hungary">
                <x-form.datalist id="countries" />
            </div>
            <div class="col-6">
                <label for="address" class="form-label fw-bold">Address</label>
                <input type="text" class="form-control" id="address" name="address"
                    placeholder="Szekszárd Mátyás király u. 12">
            </div>
            <div class="col-md-12">
                <label for="description" class="form-label fw-bold">Description</label>
                <textarea class="form-control" rows="10" id="description" name="description">
                    </textarea>
            </div>
            <div class="col-12 text-center">
                <x-buttons.roundedBtn type="submit">Change</x-buttons.roundedBtn>
            </div>
        </form>
    </x-modals.modalLayout>
    {{-- edit tournament modal end--}}

    {{-- main end --}}

</x-layout>