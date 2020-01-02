<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function warehouse() {
    	return $this->belongsTo('App\Warehouse');
    }
}
