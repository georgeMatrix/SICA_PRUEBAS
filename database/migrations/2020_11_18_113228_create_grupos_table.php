<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGruposTable extends Migration
{
    /**
     * Run the migrations.
     CREATE TABLE `Grupo` (
      `grupoID` varchar(10) NOT NULL,
      `descripcion` varchar(30) NOT NULL,
      `cuatrimestre` int(11) DEFAULT NULL,
      `periodoID` varchar(10) NOT NULL,
      `carreraID` char(4) NOT NULL,
      `docenteID` varchar(12) DEFAULT NULL,
      PRIMARY KEY (`grupoID`,`periodoID`)
    ) ENGINE=InnoDB DEFAULT CHARSET=latin1
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupos', function (Blueprint $table) {
            $table->string('grupoID',10);
            $table->string('descripcion',30);
            $table->integer('cuatrimestre');
            $table->string('periodoID');
            $table->string('carreraID');
            $table->string('docenteID');
            $table->foreign('periodoID')->references('periodoID')->on('periodos_escolares');
            $table->foreign('carreraID')->references('carreraID')->on('carreras');
            $table->foreign('docenteID')->references('docenteID')->on('docentes');
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
        Schema::dropIfExists('grupos');
    }
}
