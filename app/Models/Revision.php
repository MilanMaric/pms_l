<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Revision",
 *      required={},
 *      @SWG\Property(
 *          property="Id",
 *          description="Id",
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
 *          property="Number",
 *          description="Number",
 *          type="number",
 *          format="float"
 *      ),
 *      @SWG\Property(
 *          property="description",
 *          description="description",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="file",
 *          description="file",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="document_id",
 *          description="document_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Revision extends Model
{
    use SoftDeletes;

    public $table = 'revision';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'Date',
        'Number',
        'description',
        'file',
        'document_id',
        'deleted_at'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'Id' => 'integer',
        'Date' => 'date',
        'description' => 'string',
        'file' => 'string',
        'document_id' => 'integer',
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
