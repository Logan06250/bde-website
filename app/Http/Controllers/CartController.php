<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Cookie;

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


}

