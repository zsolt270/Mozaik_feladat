@props(['action' => '#', 'method' => 'POST','labelText', 'placeholder' => 'Quarter-final', 'btnText'])

<form class="row g-3" method="POST" action="{{$action}}">
    @csrf
    @if ($method === 'PATCH') @method('PATCH') @endif

    <div class="col-md-12">
        <label for="name" class="form-label fw-bold">{{$labelText}}</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="{{$placeholder}}">
    </div>
    <div class="col-12 text-center">
        <x-buttons.roundedBtn type="submit">{{$btnText}}</x-buttons.roundedBtn>
    </div>
</form>