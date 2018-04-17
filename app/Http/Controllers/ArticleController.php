<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Cookie;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles=Article::all();
        return view('articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasfile('image'))
         {
            $file = $request->file('image');
            $name=time().$file->getClientOriginalName();
            $file->move(public_path().'/images/', $name);
         }

        $article= new Article();
        $article->name=$request->get('name');
        $article->description=$request->get('description');
        $article->price=$request->get('price');
        $article->image=$name;
        $article->save();

        return redirect('articles')->with('success', 'L\'article à été créer avec succès.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = Article::find($id);
        return view('articles.edit',compact('article','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article= Article::find($id);

        if($request->hasfile('image'))
        {
           $file = $request->file('image');
           $article->image=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $article->image);
        }
        
        $article->name=$request->get('name');
        $article->description=$request->get('description');
        $article->price=$request->get('price'); 
        $article->save();
        return redirect('articles')->with('success', 'Les informations ont été mises à jour.');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect('articles')->with('success','L\'article a bien été supprimer');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //  disgusting code that is not code to think about

    public function addToCart($id)

    {
        if (Cookie::get('list') !== null){

            $cake = Cookie::get('list');

            $itemList = $cake . "," . $id;

        }

        else {

            $itemList = $id;

        }

        Cookie::queue(Cookie::make('list', $itemList, 5));

        return redirect('articles')->with('success', $itemList);
       
    }

}
