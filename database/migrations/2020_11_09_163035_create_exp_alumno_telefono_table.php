<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpAlumnoTelefonoTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('exp_alumno_telefono', function (Blueprint $table) {
			$table->unsignedInteger('matricula', 10);
			$table->string('telefono_fijo', 10);
			$table->string('telefono_personal', 10);
			$table->string('eMail', 50);
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
		Schema::dropIfExists('exp_alumno_telefono');
	}
}
