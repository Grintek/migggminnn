<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function iny(){

        $articles = Article::all();

        return view('includes.test.article', compact('articles'));
    }

    public function show($id){

        $article = Article::findOrFail($id);

        return view('includes.test.show', compact('article'));
    }
    public function control(){


        return view('includes.test.control');


    }
}
