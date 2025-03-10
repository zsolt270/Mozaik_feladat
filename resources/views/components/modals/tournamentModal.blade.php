@props(['id', 'method' => 'POST', 'btnText'])

<form id="{{$id}}" class="row g-3" method="POST" action="#">
    @csrf
    {{-- @if ($method === 'PATCH') @method('PATCH') @endif --}}

    <div class="col-md-12">
        <label for="name" class="form-label fw-bold">Name</label>
        <input type="text" class="form-control" id="{{$method === 'PATCH' ? 'Updatename' : 'Createname'}}" name="name"
            placeholder="Chess Tournament" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-name' : 'createError-name'}}"></span>
    </div>
    <div class="col-md-12">
        <label for="game" class="form-label fw-bold">Game</label>
        <input type="text" class="form-control" id="{{$method === 'PATCH' ? 'Updategame' : 'Creategame'}}" name="game"
            placeholder="Chess" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-game' : 'createError-game'}}"></span>
    </div>
    <div class="col-md-12">
        <label for="date" class="form-label fw-bold">Date</label>
        <input type="datetime-local" class="form-control" id="{{$method === 'PATCH' ? 'Updatedate' : 'Createdate'}}"
            name="date" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-date' : 'createError-date'}}"></span>
    </div>
    <div class="col-6">
        <label for="country" class="form-label fw-bold">Country</label>
        <input list="countries" class="form-control" id="{{$method === 'PATCH' ? 'Updatecountry' : 'Createcountry'}}"
            name="country" placeholder="Hungary" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-country' : 'createError-country'}}"></span>
        <x-form.datalist id="countries" />
    </div>
    <div class="col-6">
        <label for="address" class="form-label fw-bold">Address</label>
        <input type="text" class="form-control" id="{{$method === 'PATCH' ? 'Updateaddress' : 'Createaddress'}}"
            name="address" placeholder="Szekszárd Mátyás király u. 12" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-address' : 'createError-address'}}"></span>
    </div>
    <div class="col-md-12">
        <label for="description" class="form-label fw-bold">Description</label>
        <textarea class="form-control" rows="10"
            id="{{$method === 'PATCH' ? 'Updatedescription' : 'Createdescription'}}" name="description"></textarea>
        <span class="text-danger"
            id="{{$method === 'PATCH' ? 'updateError-description' : 'createError-description'}}"></span>
    </div>
    <div class="col-12 text-center">
        <x-buttons.roundedBtn type="submit">{{$btnText}}</x-buttons.roundedBtn>
    </div>
</form>