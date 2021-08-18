<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Manga;
use App\Models\MType;
use App\Models\MangaTag;
use App\Models\MTag;
use App\Models\MangaChapter;

class CatalogController extends Controller
{
    public function catalog() {

        return view('catalog.index');
    }

    public function manga($slug) {

        $manga = Manga::where('slug', $slug)->first();

        if(!$manga) {

            toastr()->warning("L'oeuvre demandée n'éxiste pas.");
            return redirect()->back();
        }

        $type = MType::find($manga->type);
        $tags = MTag::join('manga_tags', 'mangas_tags.id', '=', 'manga_tags.tag_id')->where('manga_tags.manga_id', $manga->id)->get();

        $chapters = MangaChapter::where('manga_id', $manga->id)->orderBy('number', 'ASC')->paginate(1);

        return view('catalog.manga.index')
            ->with('type', $type)
            ->with('tags', $tags)
            ->with('chapters', $chapters)
            ->with('manga', $manga);
    }

}
