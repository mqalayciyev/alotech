<?php

namespace App\Traits;

use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;
use Log;

trait ADNS
{
    public function getCategories (){
        $http = Http::withBasicAuth(env('API_USERNAME'), env('API_PASSWORD')
        )->withoutVerifying()->get(env('API_BASE_URL').'/CategoryList');

        if($http->status() != 200){
            throw new Exception($http->toPsrResponse()->getReasonPhrase() . " " . $http->status());
        }
        return json_decode($http->body());
    }
    public function getBrands (){
        $http = Http::withBasicAuth(env('API_USERNAME'), env('API_PASSWORD')
        )->withoutVerifying()->get(env('API_BASE_URL').'/BrandList');


        if($http->status() != 200){
            throw new Exception($http->toPsrResponse()->getReasonPhrase() . " " . $http->status());
        }


        return json_decode($http->body());
    }
    public function getProducts (){
        $http = Http::withBasicAuth(env('API_USERNAME'), env('API_PASSWORD')
        )->withoutVerifying()->get(env('API_BASE_URL').'/ProductList');

        if($http->status() != 200){
            throw new Exception($http->toPsrResponse()->getReasonPhrase() . " " . $http->status());
        }

        return json_decode($http->body());
    }
}

