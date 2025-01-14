<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function __invoke():Renderable{
        //cuando tenga el valor de status, se ejecutara la funcion
        $articles = Article::filtered()

            ->paginate()
            ->withQueryString();

        return view('article.index',compact('articles'));
    }
}
