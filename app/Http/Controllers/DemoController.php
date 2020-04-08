<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\User;

class DemoController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        factory(Article::class, 20)->create()->each(
            function ($article) use ($users) {
                $article->users()->attach($users->random(rand(1, 3))->pluck('id')->toArray());
            }
        );
    }
}
