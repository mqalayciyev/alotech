<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCompany extends Model
{
    use HasFactory;

    protected $guarded = [];

    public $timestamps = false;

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'company_id');
    }

    public function price()
    {
        return $this->hasOne('App\Models\PriceList', 'id', 'price_id');
    }
}
