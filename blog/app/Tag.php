<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];


    public function articoli()
    {
        return $this->belongsToMany(Article::class,'article_tag','tag_id','article_id')->withTimestamps();
    }
}
