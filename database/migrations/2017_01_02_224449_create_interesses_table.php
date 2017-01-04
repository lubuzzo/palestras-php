<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInteressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interesses', function (Blueprint $table) {
            $table->unsignedInteger('id_pessoa');
            $table->foreign('id_pessoa')->references('id')->on('users');
            $table->unsignedInteger('id_palestra');
            $table->foreign('id_palestra')->references('id')->on('palestras');
            $table->integer('presenca');
            $table->timestamps();
            $table->index(['id_pessoa', 'id_palestra']);
            $table->primary(['id_pessoa', 'id_palestra']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interesses');
    }
}
