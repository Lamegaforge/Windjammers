<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tournaments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('cup_id');
            $table->string('name');
            $table->bigInteger('registered')->default(0);
            $table->timestamp('start_time')->nullable();
            $table->string('challonge_url');
            $table->enum('state', ['open ', 'closed', 'finished'])->default('open');
            $table->timestamps();

            $table->foreign('cup_id')->references('id')->on('cups');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tournaments');
    }
}
