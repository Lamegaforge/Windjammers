<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participation extends Model
{
    use HasFactory;

    protected $fillable = [
    	'tournament_id',
    	'rank',
    ];

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
