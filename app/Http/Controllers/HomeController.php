<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

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
    public function index()
    {

        if (Auth::check()) {
            $person = \App\Models\Person::find(['user_id' => Auth::user()->id]);
//            Session::set('person', $person);
            return $person[0];
            return view('home', ['person' => $person,'projects'=>$person[0]->projects]);
        }
//        return view('home');
        return view('login');
    }
}
