<?php

use App\Http\Controllers\TournamentController;
use App\Models\Tournament;
use Illuminate\Support\Facades\Route;

Route::get('/', [TournamentController::class, 'index']);
Route::post('/', [TournamentController::class, 'store']);

Route::get('/proba', function () {
    return 'proba';
});

Route::get('/round', function () {
    $users = [
        [
            'uname' => 'valaki1'
        ],
        [
            'uname' => 'valaki2'
        ],
        [
            'uname' => 'valaki3'
        ],
        [
            'uname' => 'valaki4'
        ]
    ];

    return view('details', ['tournament' =>  [
        'name' => 'Chess Tournament',
        'game' => 'Chess',
        'date' => '2025.03.22 13:45',
        'country' => 'Hungary',
        'address' => 'Budapest Iskola street 12',
        'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ratione deserunt sint tempora delectus. Ex blanditiis ducimus harum! Aut earum, corrupti quam magnam sed neque minima, adipisci nam autem non ullam!',
        'rounds' => ['Round-1', 'Round-2', 'Round-3', 'Round-4', 'Round-5']
    ], 'users' => $users]);
});
