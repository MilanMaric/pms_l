<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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
 *          property="ProjectId",
 *          description="ProjectId",
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
 *      ),
 *      @SWG\Property(
 *          property="created_by",
 *          description="created_by",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="updated_by",
 *          description="updated_by",
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
        'ProjectId',
        'Description',
        'Start',
        'End',
        'Deadline',
        'Title',
        'ManHour',
        'PercentageDone',
        'Hours',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'ProjectId' => 'integer',
        'Description' => 'string',
        'Start' => 'datetime',
        'End' => 'datetime',
        'Deadline' => 'datetime',
        'Title' => 'string',
        'ManHour' => 'integer',
        'PercentageDone' => 'integer',
        'Hours' => 'integer',
        'created_by' => 'integer',
        'updated_by' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
