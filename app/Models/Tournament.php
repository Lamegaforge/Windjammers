<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Participation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tournament extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->belongsToMany(Player::class);
    }

    public function participations()
    {
        return $this->hasMany(Participation::class);
    }
}
