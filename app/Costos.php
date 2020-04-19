<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Costos extends Authenticatable
{
	protected $table = "costos";
	protected $guarded = []; 
}
