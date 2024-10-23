<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index($id){
        return view('pages.articles', [
            'title' => 'Статьи',
            'description' => 'Самые свежие новости про электронику',
            'keywords' => 'Статьи, электроника, скидки',
            'id' => $id,
        ]);
    }
    
    public function show($slug){
        return view('pages.single-article', [
            'article' => Article::where('slug', $slug)->first(),
        ]);
    }
}
