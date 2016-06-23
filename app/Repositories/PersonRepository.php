<?php

namespace App\Repositories;

use App\Models\Person;
use InfyOm\Generator\Common\BaseRepository;

class PersonRepository extends BaseRepository
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
        return Person::class;
    }
}
