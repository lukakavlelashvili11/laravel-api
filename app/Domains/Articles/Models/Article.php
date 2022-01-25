<?php

namespace App\Domains\Articles\Models;

use App\Domains\Comments\Models\Comment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $table = "articles";

    public function comments(){
        return $this->belongsToMany(Comment::class,'article_comment','article_id','comment_id');
    }
}
