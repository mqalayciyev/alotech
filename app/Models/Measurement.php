<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Measurement extends Model
{
    protected $table = 'measurement';
    protected $guarded = [];
    public $timestamps = false;

}
