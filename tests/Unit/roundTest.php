<?php

use App\Models\Round;

test('model', function () {
    $round = Round::factory(5)->create();

    expect(count($round->all()))->toBe(5);
});

test('updating round', function () {
    $rounds = Round::factory(5)->create();
    $round = $rounds->first();
    $updateValues = [
        'name' => 'Successful update',
    ];

    $round->update($updateValues);
    $round->fresh();

    expect($round->name)->toBe($updateValues['name']);
});

test('deleting round', function () {
    $round = Round::factory()->create();

    expect(Round::find($round->id))->not()->toBeNull();

    $round->delete();

    expect(Round::find($round->id))->toBeNull();
});
