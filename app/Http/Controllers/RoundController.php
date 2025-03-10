<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function show(Tournament $tournament)
    {
        // dd($tournament);
        $users = User::paginate(8);
        return view('details', ['tournament' =>  $tournament, 'users' => $users]);
    }
}
