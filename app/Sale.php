<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $primaryKey = 'sale_id';

    protected $fillable = [
        'total', 'rfc', 'id', 'created'
    ];


    public function client() {
        return $this->belongsTo('App\Client', 'rfc');
    }

    // This model can exists in N carts
    public function carts() {
        return $this->belongsToMany('App\Cart');
    }
}
