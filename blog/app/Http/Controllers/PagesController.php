<?php

namespace App\Http\Controllers;

use App\Models\Example;
use Illuminate\Http\Request;


/**
 * Class PagesController
 * @package App\Http\Controllers
 */
class PagesController extends Controller
{
    public function home()
    {
        ddd(resolve(Example::class), resolve(Example::class));
    }
}
