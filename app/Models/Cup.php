<?php

namespace App\Models;

use App\Models\Tournament;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cup extends Model
{
    use HasFactory;

    protected $appends = [
        'players_count',
    ];
    
    public function tournaments()
    {
        return $this->hasMany(Tournament::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function getPlayersCountAttribute($query)
    {
        return $this->players()->count();
    }
}
