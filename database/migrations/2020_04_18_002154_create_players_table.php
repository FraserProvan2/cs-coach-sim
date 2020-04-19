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
            $table->string('id')->unique()->nullable();
            $table->string('name');
            $table->string('type')->default('normal');
            $table->string('team')->nullable();
            $table->integer('age');
            $table->string('nationality');
            $table->float('rating');
            $table->string('headshots');
            $table->string('kd_ratio');
            $table->string('kpr');
            $table->string('dpr');
            $table->timestamps();
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
