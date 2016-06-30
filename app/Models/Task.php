<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * @SWG\Definition(
 *      definition="Task",
 *      required={},
 *      @SWG\Property(
 *          property="Id",
 *          description="Id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Description",
 *          description="Description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="Title",
 *          description="Title",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="ManHour",
 *          description="ManHour",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="PercentageDone",
 *          description="PercentageDone",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Hours",
 *          description="Hours",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Task extends Model
{
    use SoftDeletes;

    public $table = 'Task';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'project_id',
        'Description',
        'Start',
        'End',
        'Deadline',
        'Title',
        'ManHour',
        'PercentageDone',
        'Hours',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'project_id' => 'integer',
        'Description' => 'string',
        'Start' => 'datetime',
        'End' => 'datetime',
        'Deadline' => 'datetime',
        'Title' => 'string',
        'ManHour' => 'integer',
        'PercentageDone' => 'integer',
        'Hours' => 'integer',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'Start' => 'required|Date',
        'Title' => 'required',
        'PercentageDone' => 'required|min:0|max:100',
        'End' => 'required|Date|after:Start',

    ];

    public function getProjectTasks($project)
    {
        if (Auth::check) {
            $tasks = Task::where(['project_id' => $project->Id]);
            return $tasks;
        }
        return [];
    }
}
