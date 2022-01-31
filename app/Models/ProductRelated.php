<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductRelated extends Model
{
    use HasFactory;


    protected $guarded = [];

    public $timestamps = false;

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'related_id');
    }
}
