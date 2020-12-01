<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function people()
    {
        return $this->belongsToMany(Person::class, 'movie_person')->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movie_genre')->withTimestamps();
    }

    public function countries()
    {
        return $this->belongsToMany(Country::class, 'movie_country')->withTimestamps();
    }
}
