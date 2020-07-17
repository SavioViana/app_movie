<?php

namespace App\Models;

use App\Models\Actor;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'abstract',
    ];


    public function actors()
    {
        return $this->belongsToMany(Actor::class, 'movie_actor');
    }
    
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre');
    }

}
