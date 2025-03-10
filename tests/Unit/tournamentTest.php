<?php

use App\Models\Round;
use App\Models\Tournament;

test('model', function () {
    $tournament = Tournament::factory(5)->create();

    expect(count($tournament->all()))->toBe(5);
});

test('has rounds', function () {
    $tournament = Tournament::factory()->create();
    $round = Round::factory()->create([
        'tournament_id' => $tournament->id
    ]);

    expect($round->tournament()->is($tournament))->toBeTrue();
});

test('updating tournament', function () {
    $tournaments = Tournament::factory(5)->create();
    $tournament = $tournaments->first();
    $updateValues = [
        'name' => 'Successful update',
        'game' => 'something',
        'date' => '1999-01-01 10:20:00',
        'country' => 'Hungary',
        'address' => 'example street 12',
        'description' => 'example'
    ];

    $tournament->update($updateValues);
    $tournament->fresh();

    expect($tournament->name)->toBe($updateValues['name']);
    expect($tournament->game)->toBe($updateValues['game']);
    expect($tournament->date)->toBe($updateValues['date']);
    expect($tournament->country)->toBe($updateValues['country']);
    expect($tournament->address)->toBe($updateValues['address']);
    expect($tournament->description)->toBe($updateValues['description']);
});

test('deleting tournament and its rounds', function () {
    $tournament = Tournament::factory()->create();
    $rounds = Round::factory(2)->create([
        'tournament_id' => $tournament->id
    ]);

    expect(Tournament::find($tournament->id))->not()->toBeNull();
    expect(Round::find($rounds[0]->id))->not()->toBeNull();
    expect(Round::find($rounds[1]->id))->not()->toBeNull();

    $tournament->delete();

    expect(Tournament::find($tournament->id))->toBeNull();
    expect(Round::find($rounds[0]->id))->toBeNull();
    expect(Round::find($rounds[1]->id))->toBeNull();
});
