@props(['action' => '#', 'method' => 'POST', 'values' => [], 'btnText'])

<form class="row g-3" method="POST" action="#">
    @csrf
    @if ($method === 'PATCH') @method('PATCH') @endif

    <div class="col-md-12">
        <label for="name" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Chess Tournament"
            value="{{$method === 'PATCH' ? $values['name'] : ""}}">
    </div>
    <div class="col-md-12">
        <label for="game" class="form-label fw-bold">Game</label>
        <input type="text" class="form-control" id="game" name="game" placeholder="Chess"
            value="{{$method === 'PATCH' ? $values['game'] : ""}}">
    </div>
    <div class="col-md-12">
        <label for="date" class="form-label fw-bold">Date</label>
        <input type="datetime-local" class="form-control" id="date" name="date"
            value="{{$method === 'PATCH' ? $values['date'] : ""}}">
    </div>
    <div class="col-6">
        <label for="country" class="form-label fw-bold">Country</label>
        <input list="countries" class="form-control" id="country" name="country" placeholder="Hungary"
            value="{{$method === 'PATCH' ? $values['country'] : ""}}">
        <x-form.datalist id="countries" />
    </div>
    <div class="col-6">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Szekszárd Mátyás király u. 12"
            value="{{$method === 'PATCH' ? $values['address'] : ""}}">
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control" rows="10" id="description"
            name="description">{{$method === 'PATCH' ? $values['description'] : ""}}</textarea>
    </div>
    <div class="col-12 text-center">
        <x-buttons.roundedBtn type="submit">{{$btnText}}</x-buttons.roundedBtn>
    </div>
</form>