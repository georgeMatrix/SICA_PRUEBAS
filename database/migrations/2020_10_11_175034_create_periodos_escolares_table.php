<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeriodosEscolaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('periodos_escolares', function (Blueprint $table) {
            $table->string('periodoID',8)->unique();
            $table->text('descripcion');
            $table->year('anio');
            $table->date('fechaInicio');
            $table->date('fechaFin');
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
        Schema::dropIfExists('periodos_escolares');
    }
}
