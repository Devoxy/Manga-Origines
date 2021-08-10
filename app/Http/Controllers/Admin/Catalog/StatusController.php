<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


use App\Models\MStatus;


class StatusController extends Controller
{
    
    public function index() {
        
        $status = Cache::remember('admin.mangas_status', 600, function () {
            return MStatus::orderBy('id', 'DESC')->get();
        });
        
        return view('admin.catalog.status.index')->with('status', $status);
    }

    public function create(Request $request) {

        if($request->isMethod('post')) {
            
            $validator = $request->validate([
                'label' => 'required|unique:mangas_status|max:64',
                'description' => 'required',
            ]);

            $data = MStatus::create($request->all());

            toastr()->success("Vous avez créé le status : " . $data->label . " !");

            Cache::forget('admin.mangas_status');
            
            return redirect()->route('admin.catalog.status');
        }
        return view('admin.catalog.status.create');
    }

    public function edit(Request $request, $id) {

        $data = MStatus::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        if($request->isMethod('post')) {

            $validator = $request->validate([
                'label' => 'required|unique:mangas_status|max:64',
                'description' => 'required',
            ]);

            $data->update($request->all());

            toastr()->success("Vous avez édité le status : " . $data->label . " !");

            Cache::forget('admin.mangas_status');
            
            return redirect()->route('admin.catalog.status');
        }

        return view('admin.catalog.status.edit')->with('data', $data);
    }

    public function delete($id) {

        $data = MStatus::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        toastr()->success("Vous avez supprimé le status : " . $data->label . ".");

        $data->delete();

        Cache::forget('admin.mangas_status');

        return redirect()->back();
    }
}