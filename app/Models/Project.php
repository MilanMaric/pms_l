<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    public function works_on_project()
    {
        return $this->belongsToMany('App\Models\Works_On_Project');
    }

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
