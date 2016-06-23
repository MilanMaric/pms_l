<?php

namespace App\Repositories;

use App\Models\Revision;
use InfyOm\Generator\Common\BaseRepository;

class RevisionRepository extends BaseRepository
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
        return Revision::class;
    }
}
