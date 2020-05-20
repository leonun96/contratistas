<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Labores extends Model
{
	protected $table = "labores";
	protected $guarded = [];
	
	public function empresas ()
	{
		return $this->belongsTo('App\Empresas');
	}
}
