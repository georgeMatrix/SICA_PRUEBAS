<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpAlumnoDireccionTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exp_alumno_direccion', function (Blueprint $table) {
			$table->unsignedInteger('matricula', 10);
			$table->string('calle', 50);
			$table->string('numero', 5);
			$table->string('numero_int', 5);
			$table->string('colonia', 30);
			$table->string('municipio', 30);
			$table->string('estado', 30);
			$table->string('codigoPostal', 5);
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
		Schema::dropIfExists('exp_alumno_direccion');
	}
}
