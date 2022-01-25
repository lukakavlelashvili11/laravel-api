<?php

namespace App\Domains\Comments\Models;

use App\Domains\Articles\Models\Article;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public $table = 'comments';

    public function articles(){
        return $this->belongsTo(Article::class);
    }

}
