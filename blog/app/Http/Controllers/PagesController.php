<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    public function home()
    {
        return View::make('welcome');
    }
}
