<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('games', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('url');//url
            $table->text('descripcion');//descripcion
            $table->string('imagen');//url de la imagen
            $table->string('estatus');//estatus
            $table->foreignId('user_id')->references('id')->on('users'); //usuario quien lo creo
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
        Schema::dropIfExists('games');
    }
}
