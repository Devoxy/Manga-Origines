<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MStatus extends Model
{

    protected $table = 'mangas_status';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = ['label', 'description'];
}