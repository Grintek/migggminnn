<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Support\Facades\Input;
use Request;

class PagesController extends Controller
{
    public function about(){

        $articles = Article::all();

        return view('includes.about', compact('articles'));

    }
    public function postVkaut(){



        return view('vk_aut');
    }
    public function postVka(){



        return view('vk_aut');
    }

}
