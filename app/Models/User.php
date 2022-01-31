<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
	use SoftDeletes, HasApiTokens, HasFactory, Notifiable;
    protected $table = 'user';
    protected $fillable = ['first_name', 'last_name', 'email', 'mobile', 'password', 'bonus', 'remember_token', 'activation_key', 'is_active'];

	protected $hidden = [
        'password',
		'activation_key',
        'remember_token',
    ];


    protected $casts = [
        'created_at' => 'datetime:d.m.Y H:m:s',
        'updated_at' => 'datetime:d.m.Y H:m:s',
    ];

    public function detail()
    {
        return $this->hasOne('App\Models\UserDetail')->withDefault();
    }

}
