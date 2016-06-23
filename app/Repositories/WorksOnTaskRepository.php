<?php

namespace App\Repositories;

use App\Models\WorksOnTask;
use InfyOm\Generator\Common\BaseRepository;

class WorksOnTaskRepository extends BaseRepository
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
        return WorksOnTask::class;
    }
}
