<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePalestrasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palestras', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('palestrante');
            $table->dateTime('data');
            $table->string('descricao');
            $table->timestamps();
            $table->softDeletes('ativo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('palestras');
    }
}
