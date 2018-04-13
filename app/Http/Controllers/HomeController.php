<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Idea;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $events=Event::all();
        $ideas=Idea::all();

        return view('home', compact('events', 'ideas'));
    }
}
