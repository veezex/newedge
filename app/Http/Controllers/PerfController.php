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

        if ($request->has('country')) {
            $query->whereHas('countries', function(Builder $q) use ($request) {
                $q->where('countries.id', '=', $request->get('country'));
            });
        }

        return view('perf', [
            'movies' => $query->paginate(50),
            'genres' => Genre::all(),
            'countries' => Country::all(),
        ]);
    }
}
