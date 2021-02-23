<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Composers\HelloComposer;
// use Validator;
use Illuminate\Support\Facades\Validator;
use App\Http\Validators\HelloValidator;

class HelloServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
//     public function boot()
// {
//    Validator::extend('hello', function($attribute, $value,
//            $parameters, $validator) {
//        return $value % 2 == 0;
//    });
// }


public function boot()
{
   $validator = $this->app['validator'];
   $validator->resolver(function($translator, $data,
          $rules, $messages) {
       return new HelloValidator($translator, $data,
             $rules, $messages);
   });
}
}
