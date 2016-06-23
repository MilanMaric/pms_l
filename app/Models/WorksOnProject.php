<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="WorksOnProject",
 *      required={},
 *      @SWG\Property(
 *          property="PersonId",
 *          description="PersonId",
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
 *          property="role",
 *          description="role",
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
class WorksOnProject extends Model
{
    use SoftDeletes;

    public $table = 'Works_On_Project';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'PersonId',
        'ProjectId',
        'role',
        'deleted_at',
        'created_by',
        'updated_by'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'PersonId' => 'integer',
        'ProjectId' => 'integer',
        'role' => 'integer',
        'deleted_at' => 'datetime',
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
