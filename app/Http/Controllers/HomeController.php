<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Project;
use App\Models\Works_On_Project;
use Illuminate\Support\Facades\Auth;
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
            self::projectSessionHelper();
            return view('home');//, ['person' => $person, 'projects' => $projects]);
        }
//        return view('home');
        return view('login');
    }

    public static function projectSessionHelper()
    {
        if (Auth::check()) {
            $person = Person::find(['user_id' => Auth::user()->id]);
            $works_on_project = Works_On_Project::where(['person_id' => $person[0]->Id])->get();
            $projects = [];
            foreach ($works_on_project as $wp) {
                $projects[] = Project::find(['id' => $wp->project_id])[0];
            }
            Session::put('projects', $projects);
            return $projects;
        } else {
            return null;
        }
    }
}
