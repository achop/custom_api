<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use app\Tag;

class Lesson extends Model
{
    protected $fillable = ['title', 'body'];

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }

//    protected $hidden = ['title'];
}