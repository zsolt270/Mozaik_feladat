<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tournament extends Model
{
    /** @use HasFactory<\Database\Factories\TournamentFactory> */
    use HasFactory;

    protected $fillable = ['name', 'game', 'date', 'country', 'address', 'description'];

    public function rounds()
    {
        return $this->hasMany(Round::class);
    }
}
