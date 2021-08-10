<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


use App\Models\Manga;
use App\Models\MStatus;
use App\Models\MType;
use App\Models\MTag;
use App\Models\MangaTag;

class CatalogController extends Controller
{
    
    public function index() {
        
        $mangas = Cache::remember('admin.mangas', 600, function () {
            return Manga::orderBy('id', 'DESC')->get();
        });
        
        
        return view('admin.catalog.mangas.index')->with('mangas', $mangas);
    }

    public function create(Request $request) {

        if($request->isMethod('post')) {

            $validator = $request->validate([
                'name' => 'required|unique:mangas|max:128',
                'synopsis' => 'required',
                'artists' => 'required',
                'authors' => 'required',
                'cover' => 'image|mimes:jpeg,png,jpg',
                'tags' => 'required',
            ]);

            $authors = json_encode(explode(',', $request->authors));
            $artists = json_encode(explode(',', $request->artists));

            $request->request->add(['authors' => $authors]);
            $request->request->add(['artists' => $artists]);

            $slug = Str::slug($request->name, '-');
            $request->request->add(['slug' => $slug]);

            $data = Manga::create($request->all());
            

            foreach($request->tags as $tag) {
                MangaTag::create([
                    'manga_id' => $data->id,
                    'tag_id' => $tag
                ]);
            }

            toastr()->success("Vous avez créé le manga : " . $data->name . " !");

            Cache::forget('admin.mangas');
            
            return redirect()->route('admin.catalog.mangas.edit', ['id' => $data->id]);
        }

        $types = Cache::remember('admin.mangas_types', 600, function () {
            return MType::orderBy('id', 'DESC')->get();
        });

        $status = Cache::remember('admin.mangas_status', 600, function () {
            return MStatus::orderBy('id', 'DESC')->get();
        });

        $tags = Cache::remember('admin.mangas_tags', 600, function () {
            return MTag::orderBy('id', 'DESC')->get();
        });

        return view('admin.catalog.mangas.create')
            ->with('types', $types)
            ->with('tags', $tags)
            ->with('status', $status);
    }

    public function edit(Request $request, $id) {

        $data = MStatus::find($id);

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