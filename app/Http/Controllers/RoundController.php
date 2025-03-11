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

    public function getUsersList(Tournament $tournament, Round $round)
    {
        $accordion = view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();

        $usersList = view('components.modals.usersList', ['users' => User::whereDoesntHave('rounds', function ($query) use ($round) {
            $query->where('round_id', $round->id);
        })->paginate(8)])->render();

        return response()->json(["accordion" => $accordion, "usersList" => $usersList]);
    }

    public function storeCompetitor(Tournament $tournament, Round $round)
    {
        $user = User::findOrFail(request('userId'));

        $round->competitors()->attach($user->id);

        $accordion = view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();

        $usersList = view('components.modals.usersList', ['users' => User::whereDoesntHave('rounds', function ($query) use ($round) {
            $query->where('round_id', $round->id);
        })->paginate(8)])->render();

        return response()->json(["accordion" => $accordion, "usersList" => $usersList]);
    }
}
