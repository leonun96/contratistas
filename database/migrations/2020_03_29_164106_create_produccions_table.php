<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduccionsTable extends Migration
{
	/**
	dia, fecha, totes, valor_tote, total, trabajador_id
	*/
	public function up()
	{
		Schema::create('produccions', function (Blueprint $table) {
			$table->id();
			$table->string('dia')->nullable();
			$table->date('fecha')->nullable();
			$table->bigInteger('totes')->nullable();
			$table->bigInteger('valor_totes')->nullable();
			$table->bigInteger('total')->nullable();
			$table->foreignId('trabajadores_id');
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
		Schema::dropIfExists('produccions');
	}
}
