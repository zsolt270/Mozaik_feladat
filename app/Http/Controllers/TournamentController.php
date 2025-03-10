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

        $tournaments = Tournament::paginate(8);
        $html = view('components.cards.list', ['tournaments' => $tournaments])->render();
        return response()->json(["html" => $html]);
    }
}
