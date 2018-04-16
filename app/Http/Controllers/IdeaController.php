<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idea;
use App\Vote;
use App\User;
use App\Notification;
use App\Http\Resources\Idea as IdeaResource;

class IdeaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ideas=Idea::all();
        $votes=Vote::all();
        return view('ideas.index',compact('ideas', 'votes'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ideas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $idea= new Idea();
        $idea->user_id=$request->get('user_id');
        $idea->creator=$request->get('creator');
        $idea->title=$request->get('title');
        $idea->description=$request->get('description');
        $idea->save();
        return redirect('ideas')->with('success', 'Information has been added');
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
        $idea = Idea::find($id);
        return view('ideas.update',compact('idea','id'));
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
        $idea = Idea::find($id);
        $idea->creator=$request->get('creator');
        $idea->title=$request->get('title');
        $idea->description=$request->get('description');
        $idea->save();
        return redirect('ideas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idea = Idea::find($id);
        $idea->delete();
        return redirect('ideas')->with('sucess','Information supprimer');
    }




    public function ideaEvent($id)
    {
        $idea = Idea::find($id);
        
        $notification = new Notification();
        $notification->user_id = $idea->user_id;
        $notification->content = "Votre idée a été validée et un évènement a été créé ! :)";
        $notification->save();

        $idea->delete();
        return view('ideas.transform',compact('idea'));
    }

    public function private($id)
    {
        $idea = Idea::find($id);
        $idea->visibility=false;
        $idea->save();


        $users = User::all();
        foreach($users as $user){
            if($user->role==3){
                $notification = new Notification();
                $notification->user_id = $user->id;
                $notification->content = "Une idée vient d'etre signalée";
                $notification->save();
            }
        }
        $notification = new Notification();
        $notification->user_id = $idea->user_id;
        $notification->content = "Votre idée vient d'etre signalée";
        $notification->save();

        return redirect('ideas')->with('sucess','Idée passé en mode privé');
    }

    public function unPrivate($id)
    {
        $idea = Idea::find($id);
        $idea->visibility=true;
        $idea->save();
        return redirect('ideas')->with('sucess','Idée passé en mode publique');
    }
}