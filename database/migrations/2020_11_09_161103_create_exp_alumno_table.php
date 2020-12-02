<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpAlumnoTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exp_alumno', function (Blueprint $table) {
			$table->unsignedInteger('matricula', 10)->unique();
			$table->string('nombre', 30);
			$table->string('apellido_paterno', 30);
			$table->string('apellido_materno', 30);
			$table->string('sexo',1);
			$table->date('fecha_nacimiento');
			$table->string('nacionalidad', 50);
			$table->string('curp', 18);
			$table->string('edo_civil', 20);
			$table->string('seguro_social', 11);
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
		Schema::dropIfExists('exp_alumno');
	}
}
