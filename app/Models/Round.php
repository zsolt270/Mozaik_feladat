<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Round extends Model
{
    /** @use HasFactory<\Database\Factories\RoundFactory> */
    use HasFactory;

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function competitors()
    {
        return $this->belongsToMany(User::class, 'competitors');
    }
}
