<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use \stdClass;

use App\Models\User;

class DashboardController extends Controller
{
    
    public function index() {
        
        $stats = Cache::remember('dashboard.stats', 0, function () {
            
            $stats = new stdClass(); 
            
            $stats->users = User::count();
            $stats->mangas = 0;
            $stats->last_manga = 'test';
            $stats->views = 0;
            $stats->manga_most_view = 'test';
            $stats->category_most_view = 'test';

            return $stats;
        });

        return view('admin.dashboard.index')->with('stats', $stats);
    }

    public function cloud() {
        return view('admin.dashboard.cloud');
    }
}