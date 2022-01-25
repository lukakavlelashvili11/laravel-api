<?php

namespace App\Domains\Tags\Controllers;

use App\Domains\Articles\Requests\ArticlesRequest;
use App\Domains\Tags\Repositories\TagsRepository;
use App\Domains\Tags\Requests\TagRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    private $tagsRepository;

    public function __construct(TagsRepository $tagsRepository){
        $this->tagsRepository = $tagsRepository;
    }

    public function index(TagRequest $request){
        return $this->tagsRepository->index($request);
    }

    public function getTagWithArticles(ArticlesRequest $request){
        return $this->tagsRepository->getTagWithArticles($request);
    }
}
