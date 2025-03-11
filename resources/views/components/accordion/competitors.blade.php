@props(['userName', 'userId', 'roundId'])

<div class="d-flex align-items-center gap-1 mt-2">
    <p class="mb-0 fw-semibold">{{$userName}}</p>
    @can('isAdmin')
    <div>
        <button id="{{$roundId . '-'. $userId}}" class="text-danger fw-bold bg-transparent border-0">X</button>
    </div>
    @endcan
</div>