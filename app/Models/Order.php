<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;
    protected $table = 'order';
    protected $fillable = [
        'cart_id', 'order_amount', 'status',
        'first_name', 'last_name', 'email', 'address',
        'city', 'country', 'zip_code', 'phone',
        'mobile', 'bank', 'installment_number',
        'bonus_amount', 'bonus_value', 'shipping',
        'delivery_day', 'call_me', 'delivery_time'
    ];


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
        'meta' => 'json'
    ];

    public function cart()
    {
        return $this->belongsTo('App\Models\Cart');
    }

    public function userCity()
    {
        return $this->hasOne('App\Models\City', 'id', 'city');
    }
}
