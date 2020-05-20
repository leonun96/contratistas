<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
	protected $table = "pagos";
	protected $guarded = [];
	public function empresas ()
	{
		return $this->belongsTo('App\Empresas');
	}
}
