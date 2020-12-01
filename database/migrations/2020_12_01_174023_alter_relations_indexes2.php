<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRelationsIndexes2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_genre', function(Blueprint $table) {
            $table->unique(['movie_id', 'genre_id']);
        });
        Schema::table('movie_country', function(Blueprint $table) {
            $table->unique(['movie_id', 'country_id']);
        });
        Schema::table('movie_person', function(Blueprint $table) {
            $table->unique(['movie_id', 'person_id']);
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
