<?php

namespace App\Models;

use App\Http\Controllers\HomeController;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

/**
 * @SWG\Definition(
 *      definition="Project",
 *      required={},
 *      @SWG\Property(
 *          property="Id",
 *          description="Id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Title",
 *          description="Title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="StartDate",
 *          description="StartDate",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="EndDate",
 *          description="EndDate",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="Description",
 *          description="Description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Budget",
 *          description="Budget",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Project extends Model
{
    use SoftDeletes;

    public $table = 'project';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'Title',
        'StartDate',
        'EndDate',
        'Description',
        'Budget',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'Title' => 'string',
        'StartDate' => 'date',
        'EndDate' => 'date',
        'Description' => 'string',
        'Budget' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Title' => 'required|min:5|max:255',
//        'StartDate' => 'required|Date|after:tomorrow',
//        'EndDate' => 'required|Date|after:StartDate',

    ];

    public static function checkUser($project)
    {
        $projects = Session::get('projects');
        if (empty($projects)) {
            $projects = HomeController::projectSessionHelper();
        }

        foreach ($projects as $i) {
            if (!empty($i))
                if ($i->Id == $project->Id)
                    return true;
        }
        return false;
    }

    public static function getUserRole($project)
    {
        $projects = Session::get('projects');
        $persons = Person::where(['user_id' => Auth::user()->id])->get();
        $person = $persons[0];
        if (empty($projects))
            $projects = HomeController::projectSessionHelper();
        $wop = Works_On_Project::where(['project_id' => $project->Id, 'person_id' => $person->Id])->get();
        if (empty($wop)) {
            return 0;
        }
        return $wop[$wop->count() - 1];
    }


    public static function getProjectSelectArray($projects)
    {
        $p = [];
        if (!empty($projects)) {
            foreach ($projects as $project) {
                $p[$project->Id] = $project->Title;
            }
        }
        return $p;
    }

    public static function getWritableProjects($projects)
    {
        $p = [];
        $person = HomeController::getPerson();
        foreach ($projects as $project) {
            $wop = WorksOnProject::where(['project_id' => $project->Id, 'person_id' => $person->Id])->get();
            if (!empty($wop)) {
                $wop = $wop[0];
                if ($wop->role_id > 0 && $wop->role_id < 4)
                    $p[] = $project;
            }
        }
        return $p;
    }

    public static function checkWritable($projectId)
    {
        $person = HomeController::getPerson();
        $wop = WorksOnProject::where(['project_id' => $projectId, 'person_id' => $person->Id])->get();
        if (!empty($wop)) {
            $wop = $wop[0];
            if ($wop->role_id > 0 && $wop->role_id < 4)
                return true;
            else
                return false;
        } else {
            return false;
        }
    }

    public static function getFullProject($id)
    {
        $project = Project::findOrFail($id);
        $persons = [];
        $roleObj = Project::getUserRole($project);
        $role=$roleObj->role_id;
        $worksOnProjects = WorksOnProject::where(['project_id' => $project->Id])->get();
        if ($role > 0 && $role < 5) {
            foreach ($worksOnProjects as $wop) {
                $person = Person::find($wop->person_id);
                $person->role = Role::find($wop->role_id)->Description;
                $persons[] = $person;
            }

            $project->persons = $persons;
            if ($role < 4) {
                $project->incomes = Income::where(['project_id' => $project->Id])->get();
                $project->expenses = Expense::where(['project_id' => $project->Id])->get();
            }
                $tasks = Task::where(['project_id' => $project->Id])->get();
                foreach ($tasks as $task) {
                    $activities = Activity::where(['task_id' => $task->Id])->get();
                    $task->activities = $activities;
                }
                $project->tasks = $tasks;

        }
        return $project;
    }
}