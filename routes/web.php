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
    return view('round');
});
