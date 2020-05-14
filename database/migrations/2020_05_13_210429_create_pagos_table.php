<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pagos', function (Blueprint $table) {
			$table->id();
			$table->foreignId('trabajadores_id')->nullable();
			$table->foreignId('empresas_id')->nullable();
			$table->foreignId('costo_diario')->nullable();
			$table->bigInteger('cantidad')->nullable();
			$table->bigInteger('total')->nullable();
			$table->bigInteger('descuento')->nullable();
			$table->date('fecha')->nullable();
			$table->time('hora')->nullable();
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
		Schema::dropIfExists('pagos');
	}
}
