<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = [
        'sale_id', 'product_id', 'amount'
    ];

    //This model can have one or many sales
    public function sales() {
        return $this->hasMany('App\Sale');
    }

    //This model can have one or many products
    public function products() {
        return $this->hasMany('App\Product');
    }
}
