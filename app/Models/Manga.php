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

    protected $fillable = ['name', 'original_name', 'slug', 'type', 'access', 'adult', 'synopsis', 'status', 'team', 'exclusive'];

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

    public function getAccessHtml() {

        $html = '';

        if($this->access)
            $html = '<span class="badge badge-info">Tous</span>';
        else
            $html = '<span class="badge badge-warning">VIP</span>';

        return $html;
    }
}