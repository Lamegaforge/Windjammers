<?php

namespace App\Models;

use App;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'highlight',
        'thumbnail',
        'slug',
        'content',
        'active',
        'language',
        'published_at',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'active' => 'boolean',
    ];

    public function scopeLocalized($query)
    {
        return $query->where('language', App::getLocale());
    }

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
