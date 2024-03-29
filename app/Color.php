<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $fillable = [
        "description",
    ];

    public function product()
    {
        return $this->belongsTo('App\Product', 'color_id');
    }

    protected $table = "colors";
}
