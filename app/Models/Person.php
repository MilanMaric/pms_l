<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @SWG\Definition(
 *      definition="Person",
 *      required={},
 *      @SWG\Property(
 *          property="Id",
 *          description="Id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Name",
 *          description="Name",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="LastName",
 *          description="LastName",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="privileges",
 *          description="privileges",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="Address",
 *          description="Address",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="PhoneNumber",
 *          description="PhoneNumber",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="MobileNumber",
 *          description="MobileNumber",
 *          type="string"
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
class Person extends Model
{
    use SoftDeletes;

    public $table = 'Person';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'Name',
        'LastName',
        'privileges',
        'Address',
        'PhoneNumber',
        'MobileNumber',
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
        'Id' => 'integer',
        'Name' => 'string',
        'LastName' => 'string',
        'privileges' => 'integer',
        'Address' => 'string',
        'PhoneNumber' => 'string',
        'MobileNumber' => 'string',
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
