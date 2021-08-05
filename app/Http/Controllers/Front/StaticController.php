<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    public function vip() {

        return view('static.vip');
    }

    public function catalog() {
        return view('static.catalog');
    }

    public function contact(Request $request) {

        if($request->isMethod('post')) {

        }

        return view('static.contact');
    }

    public function discord() {

        return redirect()->to(config('app.discord'));
    }

    public function privacy() {
        
        return view('static.legal.privacy');
    }
}
