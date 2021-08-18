<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserHistory extends Model
{

    protected $table = 'users_history';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = ['user_id', 'manga_id', 'chapter_id', 'page'];
}