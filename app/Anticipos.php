<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anticipos extends Model
{
	protected $table = "anticipos";
	protected $guarded = [];
	public function trabajadores ()
	{
		return $this->belongsTo('App\Trabajadores');
	}
}
