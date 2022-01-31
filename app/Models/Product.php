<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use SoftDeletes;
    protected $table = 'product';
    protected $guarded = [];


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_product');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'tag_product');
    }
    public function colors()
    {
        return $this->belongsToMany('App\Models\Color', 'color_product');
    }
    public function sizes()
    {
        return $this->belongsToMany('App\Models\Size', 'size_product');
    }

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand', 'brand_product');
    }

    public function detail()
    {
        return $this->hasOne('App\Models\ProductDetail');
    }
    public function price()
    {
        return $this->hasMany('App\Models\PriceList');
    }

    public function default_price()
    {
        return $this->hasOne('App\Models\PriceList')->ofMany('default_price', 'max');
    }

    public function rating()
    {
        return $this->hasOne('App\Models\Rating');
    }

    public function image()
    {
        return $this->hasOne('App\Models\ProductImage')->orderBy('cover', 'desc');
    }
    public function images()
    {
        return $this->hasMany('App\Models\ProductImage')->orderBy('cover', 'desc');
    }
    public function related()
    {
        return $this->belongsToMany('App\Models\Product', 'product_related');
    }
    public function company()
    {
        return $this->belongsToMany('App\Models\Product', 'product_companies');
    }
    public function relateds()
    {
        return $this->hasMany('App\Models\ProductRelated', 'product_id', 'id');
    }
    public function companies()
    {
        return $this->belongsToMany('App\Models\Product', 'product_companies');
    }
    public function company_discount()
    {
        return $this->hasOne('App\Models\ProductCompany');
    }


}
