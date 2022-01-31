<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    // use SoftDeletes;

    protected $table = 'category';
    //protected $fillable = ['category_name', 'slug'];
    protected $guarded = [];


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Models\Product', 'category_product');
    }

    public function top_category()
    {
        return $this->belongsTo('App\Models\Category', 'top_id')->withDefault([
            'category_name' => __('admin.Parent Category')
        ]);
    }
    public function second_top_category()
    {
        return $this->belongsTo('App\Models\Category', 'second_id')->withDefault([
            'category_name' => __('admin.Parent Category')
        ]);
    }

    public function alt_category(){
        return $this->hasMany('App\Models\Category','top_id','id') ;
    }
    public function second_category(){
        return $this->hasMany('App\Models\Category','second_id','id') ;
    }
    public function image()
    {
        return $this->hasOne('App\Models\CategoryImage')->withDefault();
    }

}
