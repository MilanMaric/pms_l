<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Document",
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
 *          property="Description",
 *          description="Description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="project_id",
 *          description="project_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Date",
 *          description="Date",
 *          type="string",
 *          format="date"
 *      ),
 *      @SWG\Property(
 *          property="file",
 *          description="file",
 *          type="string"
 *      )
 * )
 */
class Document extends Model
{
    use SoftDeletes;

    public $table = 'Document';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'Title',
        'Description',
        'project_id',
        'Date',
        'file',
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
        'Description' => 'string',
        'project_id' => 'integer',
        'Date' => 'date',
        'file' => 'string',
        'deleted_at' => 'datetime'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];
}
