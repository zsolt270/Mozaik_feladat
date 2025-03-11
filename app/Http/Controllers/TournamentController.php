<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use App\Models\User;
use Exception;
use Illuminate\Support\Facades\Auth;

class TournamentController extends Controller
{

    public function index()
    {
        // to try access denying for normal users 
        // $user = User::where('id', 2)->first();
        // Auth::login($user);

        $admin = User::where('admin', true)->first();
        Auth::login($admin);

        $tournaments = Tournament::paginate(8);

        return view('home', ['tournaments' => $tournaments]);
    }

    public function store()
    {
        request()->validate([
            'name' => ['required', 'string'],
            'game' => ['required'],
            'date' => ['required', 'date'],
            'country' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
        ]);

        try {
            Tournament::create([
                'name' => request('name'),
                'game' => request('game'),
                'date' => request('date'),
                'country' => request('country'),
                'address' => request('address'),
                'description' => request('description'),
            ]);
        } catch (Exception $errors) {
            return response()->json(['error' => 'This name at this date is unavailable'], 500);
        }

        return $this->returnUpdatedCardsList();
    }

    public function edit(Tournament $tournament)
    {
        return response()->json($tournament);
    }

    public function update(Tournament $tournament)
    {
        request()->validate([
            'date' => ['date'],
        ]);

        $updateAttributes = [
            'name' => request('name'),
            'game' => request('game'),
            'date' => request('date'),
            'country' => request('country'),
            'address' => request('address'),
            'description' => request('description')
        ];

        if ($tournament->name === request('name') && $tournament->date === request('date')) {
            $updateAttributes['name'] = '';
            $updateAttributes['date'] = '';
        }

        try {
            $tournament->update($updateAttributes);
        } catch (Exception $errors) {
            return response()->json(['error' => 'This name at this date is unavailable'], 500);
        }

        return $this->returnUpdatedCardsList();
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();

        return $this->returnUpdatedCardsList();
    }

    private function returnUpdatedCardsList()
    {
        $tournaments = Tournament::paginate(8);
        $html = view('components.cards.list', ['tournaments' => $tournaments])->render();
        return response()->json(["html" => $html]);
    }
}
