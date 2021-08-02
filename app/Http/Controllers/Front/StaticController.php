<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    public function vip() {

        return view('static.vip');
    }

    public function contact() {

        return view('static.contact');
    }
}
