<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Cookie;
use App\Article;
use App\User;
use App\Mail\Command;

class cartController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('articles.cart',compact('carts'));
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
        
        $name=Auth::user()->name;
        if(!isset($_cookie[$name])){
            Cookie::queue(Cookie::make($name, '', 2));
        }
        $value = Cookie::get($name);
        
        $value = $value . $id . ":";
        print_r($value);
        Cookie::queue(Cookie::make($name, $value, 2));
        return redirect('/articles');
    }

    public function reset()
    {
        
        $name=Auth::user()->name;
            Cookie::queue(Cookie::make($name, '', 2));
        return redirect('/articles');
    }

    public function soldUpdate()
    {
        $value = Cookie::get(Auth::user()->name);
        $pieces = explode(":", $value);
        array_pop($pieces);

        foreach($pieces as $piece){

            $article = Article::find($piece);
            $article->sold++;
            $article->save();

        }
        $emails = User::where('role','=','3')->get();
        foreach($emails as $email){
            Mail::to($email['email'])->send(new Command());
        }
        
        

        return redirect('/setCookie')->with('success', 'Votre panier a été validé merci');
    }


}
