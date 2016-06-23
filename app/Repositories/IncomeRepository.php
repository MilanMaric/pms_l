<?php

namespace App\Repositories;

use App\Models\Income;
use InfyOm\Generator\Common\BaseRepository;

class IncomeRepository extends BaseRepository
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
        return Income::class;
    }
}
