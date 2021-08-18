<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

use App\Models\Manga;

class HomeController extends Controller
{

    public function index() {

        $tendances = Cache::remember('home.tendances', 600, function() {

            return Manga::take(10)->get();
        });

        $lasts = Cache::remember('home.lasts', 600, function() {

            return Manga::orderBy('id', 'DESC')->take(10)->get();
        });

        $updateds = Cache::remember('home.updateds', 600, function() {

            return Manga::orderBy('updated_at', 'DESC')->take(10)->get();
        });

        $exclusives = Cache::remember('home.exclusives', 600, function() {

            return Manga::where('exclusive', 1)->orderBy('updated_at', 'DESC')->take(10)->get();
        });

        return view('static.home')
            ->with('lasts', $lasts)
            ->with('tendances', $tendances)
            ->with('updateds', $updateds)
            ->with('exclusives', $exclusives);
    }
}