<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Trabajadores extends Model
{
	protected $table = "trabajadores";
	protected $guarded = [];
	public function empresas ()
	{
		return $this->belongsTo('App\Empresas');
	}
	public function pagos ()
	{
		return $this->hasMany('App\Pagos');
	}
	public function anticipos ()
	{
		return $this->hasMany('App\Anticipos');
	}
}
