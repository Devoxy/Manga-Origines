<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\MType;
use App\Models\MStatus;
use App\Models\MTag;
use App\Models\MangaTag;

class Manga extends Model
{

    protected $table = 'mangas';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['name', 'original_name', 'slug', 'type', 'access', 'adult', 'synopsis', 'status', 'team', 'exclusive', 'artists', 'authors', 'cover_path', 'banner_path'];

    public function getTypeName() {

        $type = MType::find($this->type);

        return $type->label;
    }

    public function getStatusName() {

        $status = MStatus::find($this->status);

        return $status->label;
    }

    public function getTags() {

        $tags = MangaTag::select('mangas_tags.id', 'label')->where('manga_id', $this->id)->join('mangas_tags', 'mangas_tags.id', '=', 'manga_tags.tag_id')->get();
        
        return $tags;
    }

    public function getTeamName() {

        return 'Aucune';
    }

    public function getAuthorsHtml() {

        $html = '';
        $authors = json_decode($this->authors, true);

        foreach($authors as $author) {
            $html .= '<span class="badge badge-danger">' . $author . '</span>';
        }
    
        return $html;
    }

    public function getArtistsHtml() {

        $html = '';
        $artists = json_decode($this->artists, true);

        foreach($artists as $artist) {
            $html .= '<span class="badge badge-warning">' . $artist . '</span>';
        }
    
        return $html;
    }

    public function getAccessHtml() {

        $html = '';

        if(!$this->access)
            $html = '<span class="badge badge-info">Tous</span>';
        else
            $html = '<span class="badge badge-warning">VIP</span>';

        return $html;
    }

    public function hasTag($value) {

        return MangaTag::where('tag_id', $value)->where('manga_id', $this->id)->first() ? true : false;
    }
}