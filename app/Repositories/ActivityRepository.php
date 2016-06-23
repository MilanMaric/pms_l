<?php

namespace App\Repositories;

use App\Models\Activity;
use InfyOm\Generator\Common\BaseRepository;

class ActivityRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Activity::class;
    }
}
