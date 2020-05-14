<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnticiposTable extends Migration
{
	public function up()
	{
		Schema::create('anticipos', function (Blueprint $table) {
			$table->id();
			$table->foreignId('trabajadores_id')->nullable();
			$table->bigInteger('monto')->nullable();
			$table->date('fecha')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('anticipos');
	}
}
