<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    public function warehouse() {
    	return $this->belongsTo('App\Warehouse');
    }

    public function stock() {
    	return $this->hasOne('App\Stock', 'product_id', 'id');
    }
}
