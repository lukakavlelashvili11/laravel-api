<?php

namespace App\Domains\Articles\Controllers;

use App\Domains\Articles\Repositories\ArticlesRepository;
use App\Domains\Articles\Requests\ArticlesRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{

    private $articlesRepository;

    public function __construct(ArticlesRepository $articlesRepository){
        $this->articlesRepository = $articlesRepository;
    }

    public function index(ArticlesRequest $request){
        return $this->articlesRepository->index($request);
    }

    public function getArticleWithComments(Request $request){
        return $this->articlesRepository->getArticleWithComments($request);
    }
}
