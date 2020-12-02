<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpAlumnoContactoTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exp_alumno_contacto', function (Blueprint $table) {
			$table->unsignedInteger('matricula', 10);
			$table->foreign('matricula')->references('matricula')->on('exp_alumno');
			$table->string('contacto', 30);
			$table->string('tipo', 30);
			$table->string('etiqueta', 30);
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
		Schema::dropIfExists('exp_alumno_contacto');
	}
}
