<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Project;
use App\Models\Task;
use App\Models\Works_On_Project;
use App\Models\WorksOnTask;
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
            $person = Person::where(['user_id' => Auth::user()->id])->get();
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


    public static function tasksSessionHelper()
    {
        if (Auth::check()) {
            $person = Person::where(['user_id' => Auth::user()->id])->get();
            if ($person != null && $person->count() > 0) {
                $worksOnTask = WorksOnTask::where(['person_id' => $person[0]->Id])->get();
                if (!empty($worksOnTask)) {
                    $tasks = [];
                    foreach ($worksOnTask as $item) {
                        $k = 0;
                        foreach ($tasks as $task)
                            if ($task->Id == $item->task_id) {
                                $k++;
                            }
                        if ($k == 0)
                            $tasks[] = Task::find($item->task_id);

                    }

                    Session::put('tasks', $tasks);
                    return $tasks;
                }
            }
        }
        return [];
    }

    public static function getPerson()
    {
        if (Auth::check()) {
            $person = Person::where(['user_id' => Auth::user()->id])->get();
            if (empty($person))
                return null;
            if ($person != null)
                return $person[0];
        }
    }
}
