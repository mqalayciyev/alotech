<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryImage extends Model
{
    protected $table = 'category_images';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
