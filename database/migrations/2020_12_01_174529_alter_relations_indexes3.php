<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRelationsIndexes3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_genre', function(Blueprint $table) {
            $table->index('movie_id');
            $table->index('genre_id');
        });
        Schema::table('movie_country', function(Blueprint $table) {
            $table->index('movie_id');
            $table->index('country_id');
        });
        Schema::table('movie_person', function(Blueprint $table) {
            $table->index('movie_id');
            $table->index('person_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
