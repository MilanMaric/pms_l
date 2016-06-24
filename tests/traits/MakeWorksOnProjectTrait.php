<?php

use Faker\Factory as Faker;
use App\Models\WorksOnProject;
use App\Repositories\WorksOnProjectRepository;

trait MakeWorksOnProjectTrait
{
    /**
     * Create fake instance of WorksOnProject and save it in database
     *
     * @param array $worksOnProjectFields
     * @return WorksOnProject
     */
    public function makeWorksOnProject($worksOnProjectFields = [])
    {
        /** @var WorksOnProjectRepository $worksOnProjectRepo */
        $worksOnProjectRepo = App::make(WorksOnProjectRepository::class);
        $theme = $this->fakeWorksOnProjectData($worksOnProjectFields);
        return $worksOnProjectRepo->create($theme);
    }

    /**
     * Get fake instance of WorksOnProject
     *
     * @param array $worksOnProjectFields
     * @return WorksOnProject
     */
    public function fakeWorksOnProject($worksOnProjectFields = [])
    {
        return new WorksOnProject($this->fakeWorksOnProjectData($worksOnProjectFields));
    }

    /**
     * Get fake data of WorksOnProject
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorksOnProjectData($worksOnProjectFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'person_id' => $fake->randomDigitNotNull,
            'project_id' => $fake->randomDigitNotNull,
            'role_id' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $worksOnProjectFields);
    }
}
