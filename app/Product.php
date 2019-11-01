<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        "name",
        "description",
        "price",
        "quantity",
        "color_id"
    ];

    public function colors()
    {
        return $this->hasMany('App\color', 'color_id');
    }
    
    protected $table = "products";
}
