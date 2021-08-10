<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;


use App\Models\MTag;


class TagController extends Controller
{
    
    public function index() {
        
        $tags = Cache::remember('admin.mangas_tags', 600, function () {
            return MTag::orderBy('id', 'DESC')->get();
        });
        
        return view('admin.catalog.tags.index')->with('tags', $tags);
    }

    public function create(Request $request) {

        if($request->isMethod('post')) {
            
            $validator = $request->validate([
                'label' => 'required|unique:mangas_tags|max:64',
                'description' => 'required',
                'color' => 'required'
            ]);

            $data = MTag::create($request->all());

            toastr()->success("Vous avez créé le tag de manga : " . $data->label . " !");

            Cache::forget('admin.mangas_tags');
            
            return redirect()->route('admin.catalog.tags');
        }
        return view('admin.catalog.tags.create');
    }

    public function edit(Request $request, $id) {

        $data = MTag::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        if($request->isMethod('post')) {

            $validator = $request->validate([
                'label' => 'required|max:64',
                'description' => 'required',
                'color' => 'required',
            ]);

            $data->update($request->all());

            toastr()->success("Vous avez édité le tag de mannga : " . $data->label . " !");

            Cache::forget('admin.mangas_tags');
            
            return redirect()->route('admin.catalog.tags');
        }

        return view('admin.catalog.tags.edit')->with('data', $data);
    }

    public function delete($id) {

        $data = MTag::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        toastr()->success("Vous avez supprimé le tag : " . $data->label . ".");

        $data->delete();

        Cache::forget('admin.mangas_tags');

        return redirect()->back();
    }
}