<?php

namespace App\Repositories;

use App\Models\WorksOnProject;
use InfyOm\Generator\Common\BaseRepository;

class WorksOnProjectRepository extends BaseRepository
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
        return WorksOnProject::class;
    }
}
