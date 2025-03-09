<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tournaments = [
        [
            'name' => 'Valami',
            'game' => 'Chess',
            'date' => '2025.03.22 13:45',
            'country' => 'Hungary',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami2',
            'game' => 'Checker',
            'date' => '2025.03.1 10:20',
            'country' => 'Serbia',
            'address' => 'valami u 13',
            'description' => 'jposjaoopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
        [
            'name' => 'Valami3',
            'game' => 'CS2',
            'date' => '2025.06.12 17:00',
            'country' => 'Belgium',
            'address' => 'online',
            'description' => 'jposjaopdjkaspojkdpoakpdoksapdkopsakdosa'
        ],
    ];
    return view('home', ['tournaments' => $tournaments]);
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
