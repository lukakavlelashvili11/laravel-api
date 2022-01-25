<?php

namespace App\Domains\Tags\Models;

use App\Domains\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public $table = 'tags';

    public function articles(){
        return $this->belongsToMany(Article::class,'article_tag','article_id','tag_id');
    }

}
