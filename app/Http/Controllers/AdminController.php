<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
//
		return view('admin', compact('users'));
    }


    public function beStudent($id) {

        $user = User::find($id);
        $user->role=1;
        $user->save();

        return redirect('admin');
    }

    public function beCesi($id) {

        $user = User::find($id);
        $user->role=2;
        $user->save();

        return redirect('admin');
    }

    public function beBDE($id) {

        $user = User::find($id);
        $user->role=3;
        $user->save();

        return redirect('admin');
    }

    public function beAdmin($id) {

        $user = User::find($id);
        $user->role=4;
        $user->save();

        return redirect('admin');
    }
    
}
