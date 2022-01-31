<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Size extends Model
{
    // use SoftDeletes;
    protected $table = 'size';
    protected $guarded = [];


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'size_product');
    }
    public function size_products()
    {
        return $this->hasOne('App\Models\SizeProduct')->withDefault();
    }
}
