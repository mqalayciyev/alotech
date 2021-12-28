<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class CartProduct extends Model
{
    use SoftDeletes;
    protected $table = 'cart_product';
    protected $guarded = [];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
    public function color()
    {
        return $this->belongsTo('App\Models\Color');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size');
    }

}
