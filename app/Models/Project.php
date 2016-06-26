<?php

namespace App\Models;

use App\Http\Controllers\HomeController;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
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

    public $table = 'Project';

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
        foreach ($projects as $project) {
            $p[$project->Id] = "Title: " . $project->Title . " Description: " . $project->Description;
        }
        return $p;
    }
}