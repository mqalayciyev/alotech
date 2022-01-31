<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Info;
use App\Models\Privacy;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\ShippingReturn;
use App\Models\Terms;
use Illuminate\Database\Seeder;

class WebSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::updateOrCreate(['id' => 1],[
            'first_name' => 'Mehemmed',
            'last_name' => 'Qalayciyev',
            'email' => 'qalayciyev@gmail.com',
            'mobile' => '+994514598208',
            'password' => Hash::make('12345678'),
            'is_active' => 1,
            'is_manage' => 1,
        ]);
        Info::updateOrCreate(['id' => 1],[
            'logo' => 'logo.png',
            'title' => config('app.name'),
            'description' => config('app.name'),
            'keywords' => config('app.name'),
        ]);
        About::updateOrCreate(['id' => 1],[
            'about' => config('app.name'),
        ]);
        ShippingReturn::updateOrCreate(['id' => 1],[
            'id' => 1,
            'shipping_return' => config('app.name'),
        ]);
        Terms::updateOrCreate(['id' => 1],[
            'id' => 1,
            'terms' => config('app.name'),
        ]);
        Privacy::updateOrCreate(['id' => 1],[
            'id' => 1,
            'privacy' => config('app.name'),
        ]);
    }
}
