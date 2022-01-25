<?php

namespace App\Domains\Articles\Repositories;

use App\Domains\Articles\Models\Article;
use App\Domains\Articles\Requests\ArticlesRequest;
use Illuminate\Http\Request;

class ArticlesRepository{

    private $article;

    public function __construct(Article $article){
        $this->article = $article;
    }

    public function index(ArticlesRequest $request){
        $articles = $this->article
            ->orderBy(
                $request->input('sort','created_at'),
                $request->input('order','desc')
            )
            ->limit($request->input('limit',10))
            ->paginate(
                $request->paginate,
                ['*'],
                'page',
                $request->input('page',1)
            );

        return response()->json($articles);
        //limiti paginate-stan ashkarad ar mushaobs :D
    }

    public function getArticleWithComments(Request $request){
        $comments = $this->article
            ->where('id',$request->id)
            ->with(['comments' => function($q) use ($request){
                $q->orderBy(
                    $request->input('sort','created_at'),
                    $request->input('order','desc')
                );
            }])
            ->get();

        return response()->json($comments);
    }
}