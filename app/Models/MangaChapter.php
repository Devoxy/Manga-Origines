<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MangaChapter extends Model
{

    protected $table = 'manga_chapters';
    protected $primaryKey = 'id';

    protected $fillable = ['manga_id', 'label', 'number', 'files'];
}