<?php

use App\Domains\Articles\Controllers\ArticlesController;
use App\Domains\Tags\Controllers\TagsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/articles',[ArticlesController::class,'index']);
Route::get('/articles/{id}/comments',[ArticlesController::class,'getArticleWithComments']);
Route::get('/tags',[TagsController::class,'index']);
Route::get('/tags/{id}/articles',[TagsController::class,'getTagWithArticles']);