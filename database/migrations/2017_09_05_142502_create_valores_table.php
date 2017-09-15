<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valores', function (Blueprint $table) {
            $table->increments('id');
            $table->float('valor');
            $table->integer('mes');
            $table->integer('contexto_id')->unsigned()->index();

            $table->foreign('contexto_id')
                ->references('id')->on('contextos')
                ->onDelete('cascade');

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
        Schema::dropIfExists('valores');
    }
}
