<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * docenteID
     * nombre
     * apellidoPaterno
     * apellidoMaterno
     * titulo
     * sexo
     * fechaNacimiento
     * CURP
     *
     * @return void
     */
    public function up()
    {
        Schema::create('docentes', function (Blueprint $table) {
            
        $table->string('docenteID',12)->unique();
        $table->string('nombre');
        $table->string('apellidoPaterno');
        $table->string('apellidoMaterno');
        $table->string('titulo',10);
        $table->char('sexo',1)->nullable();
        $table->date('fechaNacimiento')->nullable();
        $table->string('CURP')->nullable();;
        $table->string('tipo',5)->nullable();;
        $table->boolean('estatus')->default(false);
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
        Schema::dropIfExists('docentes');
    }
}
