<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class PerfController extends Controller
{
    public function filter(Request $request)
    {
        $query = Movie::query();

        //print(Movie::where('title', 'like', 'non%')->count());

        if ($countryId = $request->get('country')) {
            $query->whereHas('countries', function(Builder $q) use ($countryId) {
                $q->where('countries.id', '=', $countryId);
            });
        }

        if ($genreId = $request->get('genre')) {
            $query->whereHas('genres', function(Builder $q) use ($genreId) {
                $q->where('genres.id', '=', $genreId);
            });
        }

        return view('perf', [
            'movies' => $query->paginate(50),
            'genres' => Genre::all(),
            'countries' => Country::all(),
        ]);
    }
}
