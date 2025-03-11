@props(['userName', 'userId', 'roundId'])

<div class="col-12 col-sm-auto d-flex justify-content-between align-items-center mt-2">
    <p class="mb-0 fw-semibold">{{$userName}}</p>
    @can('isAdmin')
    <div>
        <button data-uid="{{$userId}}" class="text-danger fw-bold bg-transparent border-0">X</button>
    </div>
    @endcan
</div>