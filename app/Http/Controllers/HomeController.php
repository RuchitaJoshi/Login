<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
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
    public function index(Request $request)
    {

        //to delete all sessions
        //session()->flush();

        //to delete session by its name
//        session()->forget('ruchita');
//        return session()->all();

        $request->session()->flash('message', 'testing purpose');
        return $request->session()->get('message');


//        session(['ruchita'=>'student']);
//        return session('ruchita');

//        return $request->session()->get('edwin');

//        $request->session()->put(['edwin'=>'master instructor']);
//        return view('home');

//        $user = Auth::user();
//        return view('home', compact('user'));
    }
}
