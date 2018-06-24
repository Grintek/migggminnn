<?php

namespace App\Http\Controllers;

use App\Article;
use Carbon\Carbon;
use Illuminate\Html\FormFacade;

use Request;

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
    public function store(){
        $input = Request::all();
        $input['published_at'] = Carbon::now();
        Article::create($input);

        return redirect('article');
    }
}
