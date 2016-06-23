<?php

namespace App\Repositories;

use App\Models\Works_On_Project;
use InfyOm\Generator\Common\BaseRepository;

class Works_On_ProjectRepository extends BaseRepository
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
        return Works_On_Project::class;
    }
}
