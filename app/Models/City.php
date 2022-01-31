<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'city';
    protected $guarded = [];

    protected $casts = [
        'delivery_time' => 'json',
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];
}
