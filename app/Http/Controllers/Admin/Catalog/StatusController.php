<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;


class StatusController extends Controller
{
    
    public function index() {
        
        return view('admin.catalog.status.index');
    }
}