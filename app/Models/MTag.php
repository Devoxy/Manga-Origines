<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MTag extends Model
{

    protected $table = 'mangas_tags';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['label', 'description', 'color'];
}