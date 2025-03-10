@props(['users'])

<form class="row g-3" method="GET" action="#">
    @csrf

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search"
                viewBox="0 0 16 16">
                <path
                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
            </svg>
        </span>
        <input type="text" class="form-control" name="search" id="search" placeholder="Search user..."
            aria-label="Username" aria-describedby="basic-addon1">
    </div>
</form>
<div class="mt-2">
    @foreach ($users as $user)
    <div class="d-flex justify-content-between align-items-center searched-user px-2 rounded">
        <p class="mb-0">{{$user['uname']}}</p>
        <div class="d-flex align-items-center">
            <button class="text-success fw-bold bg-transparent border-0 fs-4 pb-1">+</button>
        </div>
    </div>
    @endforeach

</div>
<div>
    {{$users->links()}}
</div>