<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ValidatorServiceProvider extends ServiceProvider {

    public function boot()
    {
        $this->app['validator']->extend('UsernameValid', function ($attribute, $value, $parameters)
        {
           $validator = new \App\Rules\UsernameValid();
           return $validator->passes($attribute, $value);
        });
    }

    public function register()
    {
        //
    }
}
