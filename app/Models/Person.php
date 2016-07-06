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
 *          property="user_id",
 *          description="user_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Person extends Model
{
    use SoftDeletes;

    public $table = 'person';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];

    protected $primaryKey = 'Id';

    public $fillable = [
        'Name',
        'LastName',
        'Address',
        'PhoneNumber',
        'MobileNumber',
        'deleted_at',
        'user_id'
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
        'Address' => 'string',
        'PhoneNumber' => 'string',
        'MobileNumber' => 'string',
        'deleted_at' => 'datetime',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [

    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function project()
    {
        return $this->hasManyThrough('App\Models\Project', 'App\Models\Worsk_On_Project');
    }

    public static function toSelectValues($persons)
    {
        $s = [];
        foreach ($persons as $person) {
            $s[$person->Id] = $person->Name . ' ' . $person->LastName;
        }
        return $s;
    }

    public static function usersToSelectValues($users)
    {
        $s = [];
        foreach ($users as $user) {
            $s[$user->id] = $user->username . ' ' . $user->name;
        }
        return $s;
    }
}
