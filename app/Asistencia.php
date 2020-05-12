<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
	protected $table = "asistencias";
	protected $guarded = [];

	public function trabajadores ()
	{
		return $this->belongsTo('App\Trabajadores');
	}
}
