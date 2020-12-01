<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Person;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $genres = Genre::factory(20)->create();
        $countries = Country::factory(30)->create();

        for ($i=0; $i<500000; $i++) {
            DB::transaction(function () use ($genres, $countries) {
                $this->fakeMovie($genres->random(random_int(1, 3)), $countries->random(random_int(1, 3)));
            });
        }
    }

    private function fakeMovie(Collection $genres, Collection $countries): void
    {
        $movie = Movie::factory()->create();

        $movie->people()->sync(
            Person::factory(random_int(1, 2))->create()
        );
        $movie->countries()->sync($countries);
        $movie->genres()->sync($genres);
    }
}
