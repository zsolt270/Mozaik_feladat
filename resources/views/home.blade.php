<x-layout>
    <x-slot:title>Tournaments</x-slot:title>

    {{-- main class="container mt-5" --}}

    <div class="text-center">
        <button class="btn btn-primary shadow px-5 py-2 fw-semibold fs-5 rounded-pill" data-bs-toggle="modal"
            data-bs-target="#createTournamentModal">Create Tournament</button>
    </div>
    <section class="mt-5 d-flex justify-content-center justify-content-md-start gap-5 flex-wrap">
        @foreach ($tournaments as $tournament)
        <x-card name="{{$tournament['name']}}" game="{{$tournament['game']}}" date="{{$tournament['date']}}"
            country="{{$tournament['country']}}" address="{{$tournament['address']}}">
        </x-card>
        @endforeach
    </section>

    <div class="modal fade" id="createTournamentModal" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 text-center w-100 ps-4" id="exampleModalLabel">Create Tournament</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="POST" action="#">
                        <div class="col-md-12">
                            <label for="name" class="form-label fw-bold">Name</label>
                            <input type="text" class="form-control" id="name" name="name"
                                placeholder="Chess Tournament">
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
                            <input list="countries" class="form-control" id="country" name="country"
                                placeholder="Hungary">
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
                            <button type="submit"
                                class="btn btn-primary shadow px-5 py-2 fw-semibold fs-5 rounded-pill">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- main end --}}

</x-layout>