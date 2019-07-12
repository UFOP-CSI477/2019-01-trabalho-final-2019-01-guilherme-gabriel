<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idRemedio');
            $table->string('nome');
            $table->string('formaPagamento');
            $table->string('endereco');
            $table->integer('numero');
            $table->string('estado');
            $table->string('cidade');
            $table->timestamps();

            $table->foreign('idRemedio')->references('id')->on('remedios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('compras');
        $table->dropForeign('remedios_idRemedio_foreign');
    }
}
