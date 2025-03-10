<?php

use App\Models\Round;
use App\Models\User;
use Illuminate\Support\Facades\DB;

test('connection between rounds and users', function () {
    $round = Round::factory()->create();

    $user = User::factory()->create();

    $round->competitors()->attach($user);

    expect(DB::table('competitors')->where('round_id', $round->id)->where('user_id', $user->id)->exists())->toBeTrue();

    $round->competitors()->detach($user);

    expect(DB::table('competitors')->where('round_id', $round->id)->where('user_id', $user->id)->exists())->toBeFalse();

    $round->delete();

    expect(DB::table('competitors')->where('round_id', $round->id)->exists())->toBeFalse();
});
