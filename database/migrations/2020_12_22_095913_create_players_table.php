<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tournament_id');
            $table->string('name');
            $table->bigInteger('rank');
            $table->bigInteger('change')->default(0);
            $table->bigInteger('matchs')->default(0);
            $table->bigInteger('win')->default(0);
            $table->bigInteger('lose')->default(0);
            $table->bigInteger('draw')->default(0);
            $table->bigInteger('ratio')->default(1);
            $table->bigInteger('points')->default(0);

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
        Schema::dropIfExists('players');
    }
}
