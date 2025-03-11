@props(['id','method' => 'POST','labelText', 'btnText'])

<form id="{{$id}}" class="row g-3" method="POST" action="#">
    @csrf
    @if ($method === 'PATCH') @method('PATCH') @endif

    <div class="col-md-12">
        <label for="name" class="form-label fw-bold">{{$labelText}}</label>
        <input type="text" class="form-control" id="{{$method === 'PATCH' ? 'Updatename' : 'Createname'}}" name="name"
            placeholder="Semi-final" required>
        <span class="text-danger" id="{{$method === 'PATCH' ? 'updateError-name' : 'createError-name'}}"></span>
    </div>
    <div class="col-12 text-center">
        <x-buttons.roundedBtn type="submit">{{$btnText}}</x-buttons.roundedBtn>
    </div>
</form>