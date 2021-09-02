<?php

namespace App\Http\Controllers\Api;

use App\Article;
use App\News;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function fetchNews()
    {
        $news = News::orderByDesc('id')->paginate(5);
        return $news;
    }

    public function fetchArticles()
    {
        $articles = Article::orderByDesc('id')->paginate(5);
        return $articles;
    }
}
