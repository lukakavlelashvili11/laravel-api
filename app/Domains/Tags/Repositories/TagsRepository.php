<?php

namespace App\Domains\Tags\Repositories;

use App\Domains\Articles\Requests\ArticlesRequest;
use App\Domains\Tags\Models\Tag;
use App\Domains\Tags\Requests\TagRequest;

class TagsRepository{

    private $tag;

    public function __construct(Tag $tag){
        $this->tag = $tag;
    }

    public function index(TagRequest $request){
        $tags = $this->tag
            ->orderBy(
                $request->input('sort','created_at'),
                $request->input('order','desc')
            )
            ->get();

        return response()->json($tags);
    }

    public function getTagWithArticles(ArticlesRequest $request){
        $articles = $this->tag
            ->where('id',$request->id)
            ->with(['articles' => function($q) use ($request){
                $q->orderBy(
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
            }])
            ->get();

        return response()->json($articles);
    }
}