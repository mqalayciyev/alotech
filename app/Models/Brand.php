<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model
{
    // use SoftDeletes;
    protected $table = 'brand';
    protected $guarded = [];

    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'brand_product');
    }

}
