<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MangaTag extends Model
{

    protected $table = 'manga_tags';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['manga_id', 'tag_id'];
}