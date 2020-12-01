<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterRelationsIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('movie_genre', function(Blueprint $table) {
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->cascadeOnDelete();
            $table->foreign('genre_id')
                ->references('id')
                ->on('genres')
                ->cascadeOnDelete();
        });
        Schema::table('movie_country', function(Blueprint $table) {
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->cascadeOnDelete();
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->cascadeOnDelete();
        });
        Schema::table('movie_person', function(Blueprint $table) {
            $table->foreign('movie_id')
                ->references('id')
                ->on('movies')
                ->cascadeOnDelete();
            $table->foreign('person_id')
                ->references('id')
                ->on('people')
                ->cascadeOnDelete();
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
