<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

use File;

use Response;
use Illuminate\Support\Facades\Storage;
use App\Event;
use App\Comment;
use App\Registered;
use App\Like;
use App\User;
use App\Image;
use App\Http\Resources\Event as EventResource;

class EventController extends Controller
{

    public function __construct()
    {
                $this->middleware('auth');
    }
        

    public function create()
    {
        return view('events.create');
    }
    
    public function store(Request $request)
        {
            $name="0";
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
            $event->eventMois=$request->get('eventMois');
            $event->image=$name;
            $event->save();
            
            return redirect('events')->with('success', 'Information has been added');
        }
    
    public function index()
    {
        $events=Event::all();                                   
        $comments=Comment::all();
        $registereds=Registered::all();
        $likes=Like::all();
        $images = Image::all();
        return view('events.index',compact('events', 'comments', 'registereds','likes', 'images'));
    }

    public function show($id)
    {
        $event=Event::find($id);
        return view('events.show',compact('event'));
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
        $event->eventMois=$request->get('eventMois');
        $event->save();
        return redirect('events')->with('success','Information has been  updated');
    }

    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();
        return redirect('events')->with('success','Information has been  deleted');
    }

    public function downloadPDF($id)

    {
        $registereds = Registered::all();

        $data = "Liste des inscrit : \n";

        foreach($registereds as $registered){
            if($registered->event_id == $id){
                $data = $data . User::where('id',$registered->user_id)->value('name') . "\n";
            }

        }
        $fileName = time() . '.pdf';
        File::put(public_path('inscrits'.$fileName),$data);
        return Response::download(public_path('inscrits'.$fileName));

    }

    public function downloadCSV($id)
{
    $headers = array(
        "Content-type" => "text/csv",
        "Content-Disposition" => "attachment; filename=file.csv",
        "Pragma" => "no-cache",
        "Cache-Control" => "must-revalidate, post-check=0, pre-check=0",
        "Expires" => "0"
    );

    $registereds = Registered::all();

    $columns = array('Name');

    $callback = function() use ($registereds, $columns, $id)
    {
        $file = fopen('php://output', 'w');
        fputcsv($file, $columns);

        foreach($registereds as $registered) {
            if($registered->event_id == $id){
            fputcsv($file, array(User::where('id',$registered->user_id)->value('name') . "\n"));
            }
        }
        fclose($file);
        };
        return Response::stream($callback, 200, $headers);
    }

}
