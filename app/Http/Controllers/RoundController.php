<?php

namespace App\Http\Controllers;

use App\Models\Round;
use App\Models\Tournament;
use App\Models\User;
use Exception;

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

        $html = $this->renderAccordion($tournament);
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

        $html = $this->renderAccordion($tournament);
        return response()->json(["html" => $html]);
    }

    public function destroy(Tournament $tournament, Round $round)
    {
        $round->delete();

        $html = $this->renderAccordion($tournament);
        return response()->json(["html" => $html]);
    }

    public function getUsersList(Tournament $tournament, Round $round)
    {
        $usersList = view('components.modals.usersList', ['users' => $this->getUsersListForRound($round)])->render();

        return response()->json(["usersList" => $usersList]);
    }

    public function storeCompetitor(Tournament $tournament, Round $round, User $user)
    {
        $round->competitors()->attach($user->id);

        $accordion = $this->renderAccordion($tournament);

        $usersList = view('components.modals.usersList', ['users' => $this->getUsersListForRound($round)])->render();

        return response()->json(["accordion" => $accordion, "usersList" => $usersList]);
    }

    public function destroyCompetitor(Tournament $tournament, Round $round, User $user)
    {
        $round->competitors()->detach($user->id);

        $html = $this->renderAccordion($tournament);
        return response()->json(["html" => $html]);
    }

    public function getSearchedUsers(Tournament $tournament, Round $round,)
    {
        $users = User::whereDoesntHave('rounds', function ($query) use ($round) {
            $query->where('round_id', $round->id);
        });

        $searchedUsers = $users->where('uname', 'like', "%" . request('query') . "%");

        $usersList = view('components.modals.usersList', ['users' => $searchedUsers->paginate(8)])->render();

        return response()->json(["usersList" => $usersList]);
    }

    private function renderAccordion(Tournament $tournament)
    {
        return view('components.accordion.accordionLayout', ['tournament' => $tournament])->render();
    }

    private function getUsersListForRound(Round $round)
    {
        return User::whereDoesntHave('rounds', function ($query) use ($round) {
            $query->where('round_id', $round->id);
        })->paginate(8);
    }
}
