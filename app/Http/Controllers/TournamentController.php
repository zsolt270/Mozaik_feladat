<?php

namespace App\Http\Controllers;

use App\Models\Tournament;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

use function Pest\Laravel\json;

class TournamentController extends Controller
{

    public function index()
    {
        $tournaments = Tournament::paginate(8);

        return view('home', ['tournaments' => $tournaments]);
    }

    public function store()
    {
        $this->validateTournament();

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
        $this->validateTournament();

        try {
            $tournament->update([
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

    public function destroy(Tournament $tournament)
    {

        $tournament->delete();

        return $this->returnUpdatedCardsList();
    }

    private function validateTournament()
    {
        request()->validate([
            'name' => ['required', 'string'],
            'game' => ['required'],
            'date' => ['required', 'date'],
            'country' => ['required'],
            'address' => ['required'],
            'description' => ['required'],
        ]);
    }

    private function returnUpdatedCardsList()
    {
        $tournaments = Tournament::paginate(8);
        $html = view('components.cards.list', ['tournaments' => $tournaments])->render();
        return response()->json(["html" => $html]);
    }
}
