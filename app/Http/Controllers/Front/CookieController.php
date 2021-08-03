<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cookie;

class CookieController extends Controller
{
    public function changeMode($mode) {

        Cookie::queue('theme-mode', $mode, 43200);

        return 'ok';
    }
}
