<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    protected $fillable = [
        'name',
        'email',
    ];

    public function movies()
    {
        return $this->belongsToMany(Movie::class, 'movie_actor');
    }
}
