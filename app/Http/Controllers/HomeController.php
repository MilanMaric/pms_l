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

            return view('home', ['projects' => self::projectSessionHelper()]);//, ['person' => $person, 'projects' => $projects]);
        }
//        return view('home');
        return view('login');
    }

    public static function projectSessionHelper()
    {
        if (Auth::check()) {
            $person = Person::find(['user_id' => Auth::user()->id]);
            if ($person != null && $person->count() > 0) {
                $works_on_project = Works_On_Project::where(['person_id' => $person[0]->Id])->get();
                $projects = [];
                if ($works_on_project != null && $works_on_project->count() > 0)
                    foreach ($works_on_project as $wp) {
                        $projects[] = Project::find(['id' => $wp->project_id])[0];
                    }
                Session::put('projects', $projects);
                return $projects;
            }
            return [];
        } else {
            return [];
        }
    }
}
