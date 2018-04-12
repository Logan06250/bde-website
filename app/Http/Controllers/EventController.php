<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;

class EventController extends Controller
{

    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
        {
            if($request->hasfile('image'))
             {
                $file = $request->file('image');
                $name=time().$file->getClientOriginalName();
                $file->move(public_path().'/images/', $name);
             }
            $event= new Event();
            $event->name=$request->get('name');
            $event->description=$request->get('description');
            $date=date_create($request->get('date'));
            $format = date_format($date,"Y-m-d");
            $event->date = strtotime($format);
            $event->visibility=$request->get('visibility');
            $event->image=$name;
            $event->save();
            
            return redirect('events')->with('success', 'Information has been added');
        }
    
    public function index()
    {
        $events=Event::all();
        return view('events.index',compact('events'));
    }

    public function show()
    {
        $events=Event::all();
        return view('events.show',compact('events'));
    }

    public function edit($id)
    {
        $event = Event::find($id);
        return view('events.edit',compact('event','id'));
    }
    
    public function update(Request $request, $id)
    {
        $event= Event::find($id);
        if($request->hasfile('image'))
        {
           $file = $request->file('image');
           $event->image=time().$file->getClientOriginalName();
           $file->move(public_path().'/images/', $event->image);
        }
        $event->name=$request->get('name');
        $event->description=$request->get('description');
        $date=date_create($request->get('date'));
        $format = date_format($date,"Y-m-d");
        $event->date = strtotime($format);
        $event->visibility=$request->get('visibility');
        $event->save();
        return redirect('events')->with('success','Information has been  updated');
    }

    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();
        return redirect('events')->with('success','Information has been  deleted');
    }
}
