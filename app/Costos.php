<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Costos extends Authenticatable
{
	protected $table = "costo_diario";
	protected $guarded = [];
	public function empresas ()
	{
		return $this->belongsTo('App\Empresas');
	}
}
