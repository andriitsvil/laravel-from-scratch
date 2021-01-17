<?php


namespace App;


use App\Models\Example;
use Illuminate\Support\Facades\Facade;

class ExampleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return Example::class; // App\Models\Example
    }

}