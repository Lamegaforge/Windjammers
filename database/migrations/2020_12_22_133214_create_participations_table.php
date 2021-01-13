<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('player_id');
            $table->unsignedBigInteger('tournament_id');
            $table->bigInteger('rank');
            $table->bigInteger('win')->default(0);
            $table->bigInteger('lose')->default(0);
            $table->bigInteger('draw')->default(0);
            $table->bigInteger('points')->default(0);
            $table->timestamps();

            $table->foreign('player_id')->references('id')->on('players');
            $table->foreign('tournament_id')->references('id')->on('tournaments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participations');
    }
}
