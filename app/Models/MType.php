<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MType extends Model
{

    protected $table = 'mangas_types';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['label', 'description'];
}