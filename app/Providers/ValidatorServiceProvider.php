<?php
namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Validator::extend('aaaa', function ($attribute, $value, $parameters) {
            // var_dump($value);
            // var_dump($attribute);
            // var_dump($parameters);
            // die();
            return$value=='aaaa';
        });
        // return true;
    }

    public function register()
    {
    }
}
