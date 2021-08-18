<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

        $chapters = MangaChapter::where('manga_id', $manga->id)->orderBy('number', 'DESC')->paginate(12);

        return view('catalog.manga.index')
            ->with('type', $type)
            ->with('tags', $tags)
            ->with('chapters', $chapters)
            ->with('manga', $manga);
    }

    public function readManga(Request $request, $slug) {

        $manga = Manga::where('slug', $slug)->first();

        if(!$manga) {

            toastr()->warning("L'oeuvre demandée n'éxiste pas.");
            return redirect()->back();
        }

        $chapterNumber = $request->chapter;

        if(!$chapterNumber)
            $chapter = MangaChapter::where('manga_id', $manga->id)->orderBy('number', 'ASC')->first();
        else {

            if($chapterNumber == 'last')
                $chapter = MangaChapter::where('manga_id', $manga->id)->orderBy('number', 'DESC')->first();
            else
                $chapter = MangaChapter::where('manga_id', $manga->id)->where('number', $chapterNumber)->first();
        }
            
        $files = Storage::disk('cloud')->files('catalog/' . $manga->slug . '/Chapitre-' . $chapter->number);

        $next = MangaChapter::select('number')->where('manga_id', $manga->id)->where('number', '>', $chapter->number)->orderBy('number', 'ASC')->first();
        $previous = MangaChapter::select('number')->where('manga_id', $manga->id)->where('number', '<', $chapter->number)->orderBy('number', 'DESC')->first();

        if(!$next)
            $next = null;
        else
            $next = $next->number;

        if(!$previous)
            $previous = null;
        else
            $previous = $previous->number;

        $chapter->views++;
        $chapter->save();

        return view('catalog.manga.read')
            ->with('manga', $manga)
            ->with('chapter', $chapter)
            ->with('next', $next)
            ->with('previous', $previous)
            ->with('files', $files);
    }

}
