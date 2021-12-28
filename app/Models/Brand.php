<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    // use SoftDeletes;
    protected $table = 'brand';
    protected $guarded = [];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'brand_product');
    }

}
