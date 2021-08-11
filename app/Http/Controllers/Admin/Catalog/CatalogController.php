<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Zip;


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
                'banner' => 'image|mimes:jpeg,png,jpg',
                'tags' => 'required',
            ]);

            $authors = json_encode(explode(',', $request->authors));
            $artists = json_encode(explode(',', $request->artists));

            $request->request->add(['authors' => $authors]);
            $request->request->add(['artists' => $artists]);

            $slug = Str::slug($request->name, '-');
            $request->request->add(['slug' => $slug]);

            $path = 'catalog/' . $slug;

            Storage::disk('cloud')->makeDirectory($path);

            if($request->hasFile('cover')) {

                $path = $path . '/cover-' . $slug . '.' . $request->file('cover')->extension();
                Storage::disk('cloud')->put($path, file_get_contents($request->file('cover')), 'public');
                $request->request->add(['cover_path' => $path]);
            }

            if($request->hasFile('banner')) {

                $path = $path . '/banner-' . $slug . '.' . $request->file('banner')->extension();
                Storage::disk('cloud')->put($path, file_get_contents($request->file('banner')), 'public');
                $request->request->add(['banner_' => $path]);
            }

            $data = Manga::create($request->all());
            

            foreach($request->tags as $tag) {
                MangaTag::create([
                    'manga_id' => $data->id,
                    'tag_id' => $tag
                ]);
            }

            toastr()->success("Vous avez créé l'oeuvre : " . $data->name . " !");

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

        $manga = Manga::find($id);

        if(!$manga) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        if($request->isMethod('post')) {

            $validator = $request->validate([
                'synopsis' => 'required',
                'artists' => 'required',
                'authors' => 'required',
                'tags' => 'required',
                'cover' => 'image|mimes:jpeg,png,jpg',
                'bannner' => 'image|mimes:jpeg,png,jpg',
            ]);

            $authors = json_encode(explode(',', $request->authors));
            $artists = json_encode(explode(',', $request->artists));

            $request->request->add(['authors' => $authors]);
            $request->request->add(['artists' => $artists]);

            $path = 'catalog/' . $manga->slug;
            
            if($request->hasFile('cover')) {

                $path = $path . '/cover-' . $manga->slug . '.' . $request->file('cover')->extension();
                Storage::disk('cloud')->put($path, file_get_contents($request->file('cover')), 'public');
                $request->request->add(['cover_path' => $path]);
            }

            if($request->hasFile('banner')) {

                $path = $path . '/banner-' . $manga->slug . '.' . $request->file('banner')->extension();
                Storage::disk('cloud')->put($path, file_get_contents($request->file('banner')), 'public');
                $request->request->add(['banner_path' => $path]);
            }

            $manga->update($request->all());

            MangaTag::where('manga_id', $manga->id)->delete();

            foreach($request->tags as $tag) {
                MangaTag::create([
                    'manga_id' => $manga->id,
                    'tag_id' => $tag
                ]);
            }
            

            toastr()->success("Vous avez édité l'oeuvre : " . $manga->name . " !");

            Cache::forget('admin.mangas');
            
            return redirect()->back();
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

        return view('admin.catalog.mangas.edit')
            ->with('manga', $manga)
            ->with('types', $types)
            ->with('tags', $tags)
            ->with('status', $status);
    }

    public function delete($id) {

        $data = Manga::find($id);

        if(!$data) {

            toastr()->warning("L'information demandée n'éxiste pas.");
            return redirect()->back();
        }

        toastr()->success("Vous avez supprimé l'oeuvre : " . $data->label . ".");

        Storage::disk('cloud')->deleteDirectory('catalog/' . $data->slug);

        $data->delete();

        Cache::forget('admin.mangas');

        return redirect()->back();
    }

    public function upload(Request $request) {

        $file = $request->file('files')[0];
        $unzipper  = new Unzip();

        $filename = time() . $file->getClientOriginalName();

        Storage::disk('public')->putFileAs(
            'uploads/',
            $file,
            $filename
        );

        echo $filename;

        //$filenames = $unzipper->extract('uploads/' . $filename, 'uploads/');
        return 'ok';
    }

    public function test() {

        $manga = Manga::find(18);

        $zipFileName = 'Maidens In-Law.zip';
        $folderFileName = explode('.', $zipFileName)[0];
        
        $zip = Zip::open(Storage::disk('public')->path('uploads/' . $zipFileName));
        $zip->extract(Storage::disk('public')->path('uploads/' . $folderFileName));
        $zip->close();

        $chapters = Storage::disk('public')->directories('uploads/' . $folderFileName);

        if(count($chapters) >= 1) {

            foreach($chapters as $chapter) {

                $chapterName = basename($chapter);
                preg_match_all('!\d+!', $chapterName, $matches);
                
                if(count($matches) > 1) {

                    // ERREUR (plusieeurs numéros détectés)
                }

                $chapterNumber = $matches[0][0];

                Storage::disk('cloud')->makeDirectory('catalog/' . $manga->slug . '/Chapitre ' . $chapterNumber);

                foreach(Storage::disk('public')->files('uploads/' . $folderFileName . '/' . $chapterName) as $file) {
                    Storage::disk('cloud')->put('catalog/' . $manga->slug . '/Chapitre ' . $chapterNumber . '/' . basename($file), $file, 'public');
                }
            }
            // MULTI UPLOAD
        } else {

            // SIMPLE UPLOAD
        }

        //Storage::disk('public')->delete('uploads/' . $zipFileName);
    }
}