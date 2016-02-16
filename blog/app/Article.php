<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    protected $guarded = [];

    public function autore()
    {
        return $this->belongsTo(User::class,'author_id','id');
    }

    public function etichette()
    {
        return $this->belongsToMany(Tag::class,'article_tag','article_id','tag_id')->withTimestamps();
    }
}
