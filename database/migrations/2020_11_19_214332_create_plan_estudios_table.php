<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanEstudiosTable extends Migration
{
    /**
     * Run the migrations.
     * columns: planID
     * columns: descripcion
     * columns: vigencia
     * columns: carreraID
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_estudios', function (Blueprint $table) {
            $table->string('planID',10)->unique();;
            $table->string('descripcion');
            $table->year('vigencia');
            $table->string('carreraID');
            $table->foreign('carreraID')->references('carreraID')->on('carreras');
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
        Schema::dropIfExists('plan_estudios');
    }
}
