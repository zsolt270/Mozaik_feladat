@props(['users'])

<article id="usersContainer">
    <div class="mt-2">
        @foreach ($users as $user)
        <div id="user-{{$user->id}}"
            class="d-flex justify-content-between align-items-center searched-user px-2 rounded">
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
</article>