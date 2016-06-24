<?php

use Faker\Factory as Faker;
use App\Models\WorksOnTask;
use App\Repositories\WorksOnTaskRepository;

trait MakeWorksOnTaskTrait
{
    /**
     * Create fake instance of WorksOnTask and save it in database
     *
     * @param array $worksOnTaskFields
     * @return WorksOnTask
     */
    public function makeWorksOnTask($worksOnTaskFields = [])
    {
        /** @var WorksOnTaskRepository $worksOnTaskRepo */
        $worksOnTaskRepo = App::make(WorksOnTaskRepository::class);
        $theme = $this->fakeWorksOnTaskData($worksOnTaskFields);
        return $worksOnTaskRepo->create($theme);
    }

    /**
     * Get fake instance of WorksOnTask
     *
     * @param array $worksOnTaskFields
     * @return WorksOnTask
     */
    public function fakeWorksOnTask($worksOnTaskFields = [])
    {
        return new WorksOnTask($this->fakeWorksOnTaskData($worksOnTaskFields));
    }

    /**
     * Get fake data of WorksOnTask
     *
     * @param array $postFields
     * @return array
     */
    public function fakeWorksOnTaskData($worksOnTaskFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'task_id' => $fake->randomDigitNotNull,
            'person_id' => $fake->randomDigitNotNull,
            'activity_id' => $fake->randomDigitNotNull,
            'StartDate' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $worksOnTaskFields);
    }
}
