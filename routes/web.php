<?php

use App\Http\Controllers\RoundController;
use App\Http\Controllers\TournamentController;
use App\Models\Round;
use Illuminate\Support\Facades\Route;

Route::get('/', [TournamentController::class, 'index']);
Route::post('/', [TournamentController::class, 'store'])->middleware(['auth', 'can:isAdmin']);
Route::get('/{tournament}/edit', [TournamentController::class, 'edit'])->middleware(['auth', 'can:isAdmin']);
Route::patch('/{tournament}', [TournamentController::class, 'update'])->middleware(['auth', 'can:isAdmin']);
Route::delete('/{tournament}', [TournamentController::class, 'destroy'])->middleware(['auth', 'can:isAdmin']);

Route::get('/{tournament}/show', [RoundController::class, 'show']);
Route::post('/{tournament}/create-round', [RoundController::class, 'store'])->middleware(['auth', 'can:isAdmin']);;
Route::patch('/{tournament}/{round}', [RoundController::class, 'update'])->middleware(['auth', 'can:isAdmin']);
Route::delete('/{tournament}/{round}', [RoundController::class, 'destroy'])->middleware(['auth', 'can:isAdmin']);

Route::get('/{tournament}/{round}/competitors', [RoundController::class, 'getUsersList']);
Route::post('/{tournament}/{round}/create-competitor', [RoundController::class, 'storeCompetitor'])->middleware(['auth', 'can:isAdmin']);
