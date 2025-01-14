<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Article;
class ArticleController extends Controller
{
    public function __invoke():Renderable{
        //cuando tenga el valor de status, se ejecutara la funcion
        $articles = Article::query()
            ->when(request()->query("status"),function($query){
                $query->where("status",request()->query("status"));
        })
            ->when(request()->query("sort"),function($query) {
                //cuando tenga el valor de sort, se ejecutara la funcion
                $query->orderBy("id", request()->query("sort"));
            })
            ->paginate()
            ->withQueryString();

        return view('article.index',compact('articles'));
    }
}
