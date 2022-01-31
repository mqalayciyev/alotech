<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    protected $guarded = [];
    public $timestamps = false;


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function product()
    {
        return $this->belongsTo('App\Models\Product');
    }
}
