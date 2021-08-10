<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


use App\Models\MType;


class TypeController extends Controller
{
    
    public function index() {
        
        $types = Cache::remember('admin.mangas_types', 600, function () {
            return MType::orderBy('id', 'DESC')->get();
        });
        
        return view('admin.catalog.types.index')->with('types', $types);
    }

    public function create(Request $request) {

        if($request->isMethod('post')) {
            
            $validator = $request->validate([
                'label' => 'required|unique:mangas_types|max:64',
                'description' => 'required',
            ]);

            $data = MType::create($request->all());

            toastr()->success("Vous avez créé le type de manga : " . $data->label . " !");

            Cache::forget('admin.mangas_types');
            
            return redirect()->route('admin.catalog.types');
        }
        return view('admin.catalog.types.create');
    }

    public function edit(Request $request, $id) {

        $data = MType::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        if($request->isMethod('post')) {

            $validator = $request->validate([
                'label' => 'required|max:64',
                'description' => 'required',
            ]);

            $data->update($request->all());

            toastr()->success("Vous avez édité le type de manga : " . $data->label . " !");

            Cache::forget('admin.mangas_types');
            
            return redirect()->route('admin.catalog.types');
        }

        return view('admin.catalog.types.edit')->with('data', $data);
    }

    public function delete($id) {

        $data = MType::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        toastr()->success("Vous avez supprimé le types : " . $data->label . ".");

        $data->delete();

        Cache::forget('admin.mangas_types');

        return redirect()->back();
    }
}