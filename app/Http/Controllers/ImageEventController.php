<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Image;

class ImageEventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $name="0";
            if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
             }
        $image= new Image();
        $image->image = $name;
        $image->event_id=$request->get('event_id');
        $image->userName=$request->get('userName');
        $image->save();
        
        return redirect('events')->with('success', 'Votre image a été bien pris en compte');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $image = Image::find($id);
        $image->delete();
        return redirect('events');
    }
}
