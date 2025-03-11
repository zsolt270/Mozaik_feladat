<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Tournament;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class RoundController extends Controller
{
    public function show(Tournament $tournament)
    {
        $users = User::paginate(8);
        return view('details', ['tournament' =>  $tournament, 'users' => $users]);
    }

    public function store(Tournament $tournament)
    {
        request()->validate([
            'name' => ['required']
        ]);

        try {
            Round::create([
                'name' => request('name'),
                'tournament_id' => $tournament->id
            ]);
        } catch (Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }

        $html = view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();
        return response()->json(["html" => $html]);
    }

    public function update(Tournament $tournament, Round $round)
    {
        request()->validate([
            'name' => ['required']
        ]);

        try {
            $round->update([
                'name' => request('name'),
            ]);
        } catch (Exception $errors) {
            return response()->json(['error' => $errors->getMessage()], 500);
        }

        $html = view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();
        return response()->json(["html" => $html]);
    }

    public function destroy(Tournament $tournament, Round $round)
    {
        $round->delete();

        $html = view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();
        return response()->json(["html" => $html]);
    }
}
