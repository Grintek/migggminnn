<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){

        $articles = Article::all();

        return view('includes.about', compact('articles'));

    }

}
