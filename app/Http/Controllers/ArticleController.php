<?php

namespace App\Http\Controllers;

use App\Models\Article;

class ArticleController extends Controller
{
    public function users(Article $article)
    {
        return response()->json($article->users);
    }
}
