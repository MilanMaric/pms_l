<?php

use Faker\Factory as Faker;
use App\Models\Task;
use App\Repositories\TaskRepository;

trait MakeTaskTrait
{
    /**
     * Create fake instance of Task and save it in database
     *
     * @param array $taskFields
     * @return Task
     */
    public function makeTask($taskFields = [])
    {
        /** @var TaskRepository $taskRepo */
        $taskRepo = App::make(TaskRepository::class);
        $theme = $this->fakeTaskData($taskFields);
        return $taskRepo->create($theme);
    }

    /**
     * Get fake instance of Task
     *
     * @param array $taskFields
     * @return Task
     */
    public function fakeTask($taskFields = [])
    {
        return new Task($this->fakeTaskData($taskFields));
    }

    /**
     * Get fake data of Task
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTaskData($taskFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'project_id' => $fake->randomDigitNotNull,
            'Description' => $fake->word,
            'Start' => $fake->word,
            'End' => $fake->word,
            'Deadline' => $fake->word,
            'Title' => $fake->word,
            'ManHour' => $fake->randomDigitNotNull,
            'PercentageDone' => $fake->randomDigitNotNull,
            'Hours' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word,
            'deleted_at' => $fake->word
        ], $taskFields);
    }
}
