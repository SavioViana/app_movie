<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_genre');
    }

}
