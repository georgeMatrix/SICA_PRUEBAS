<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *  materiaID
     *  descripcion
     *  claveMateria
     *  creditos
     *  unidades
     *  planID
     *  carreraID
     *  cuatrimestre
     *  objetivo
     *  justificacion
     *  totalHoras
     *  estatus
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->string('materiaID')->unique();
            $table->string('descripcion');
            $table->string('claveMateria');
            $table->integer('creditos');
            $table->integer('unidades');
            $table->string('planID');
            $table->string('carreraID');
            $table->integer('cuatrimestre');
            $table->string('objetivo');
            $table->string('justificacion');
            $table->integer('totalHoras');
            $table->boolean('estatus');
            $table->timestamps();
            $table->foreign('planID')->references('planID')->on('plan_estudios');
            $table->foreign('carreraID')->references('carreraID')->on('carreras');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
