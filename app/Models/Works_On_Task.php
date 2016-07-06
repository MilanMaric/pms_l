<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Works_On_Task",
 *      required={},
 *      @SWG\Property(
 *          property="TaskId",
 *          description="TaskId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="PersonId",
 *          description="PersonId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="ActivityId",
 *          description="ActivityId",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="StartDate",
 *          description="StartDate",
 *          type="string",
 *          format="date"
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
class Works_On_Task extends Model
{
    use SoftDeletes;

    public $table = 'works_on_task';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'TaskId',
        'PersonId',
        'ActivityId',
        'StartDate',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'TaskId' => 'integer',
        'PersonId' => 'integer',
        'ActivityId' => 'integer',
        'StartDate' => 'date',
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
