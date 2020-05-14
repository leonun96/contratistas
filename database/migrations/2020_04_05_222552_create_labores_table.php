<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaboresTable extends Migration
{
	public function up()
	{
		Schema::create('labores', function (Blueprint $table) {
			$table->id();
			$table->string('labor')->nullable();
			$table->foreignId('empresas_id')->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::dropIfExists('labores');
	}
}
