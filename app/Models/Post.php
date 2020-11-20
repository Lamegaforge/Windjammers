<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    public function scopeDisplayable($query)
    {
        return $query->active()
            ->where('published_at', '<', Carbon::today());
    }

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
