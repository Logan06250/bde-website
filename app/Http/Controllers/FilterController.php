<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;


class FilterController extends Controller
{
    public function store(Request $request)
    {

        $priceMin = $request->get('priceMin');
        $priceMax = $request->get('priceMax');


        $articles =Article::where([['price', '<=', $priceMax],['price', '>=', $priceMin]])->get();

        return view('articles.index', compact('articles'));

    }
}
