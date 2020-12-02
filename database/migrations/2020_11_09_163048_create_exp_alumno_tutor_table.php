<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpAlumnoTutorTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exp_alumno_tutor', function (Blueprint $table) {
			$table->unsignedInteger('matricula', 10);
			$table->string('nombre_tutor', 30);
			$table->string('apPaterno_tutor', 30);
			$table->string('apMaterno_tutor', 30);
			$table->string('parentesco', 30);
			$table->string('trabajo_tutor', 50);
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
		Schema::dropIfExists('exp_alumno_tutor');
	}
}
